<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Officers Controller
 *
 * @property \App\Model\Table\OfficersTable $Officers
 */
class OfficersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'complaints',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function register()
    {
        $officer = $this->Officers->newEmptyEntity();
        if ($this->request->is('post')) {
            $officer = $this->Officers->patchEntity($officer, $this->request->getData());
            if ($this->Officers->save($officer)) {
                $this->Flash->success(__('The officer has been saved.'));


                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The officer could not be saved. Please, try again.'));
        }
        $this->set(compact('officer'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $level = $this->Authentication->getIdentity()->get('level');
        $id = $this->Authentication->getIdentity()->get('id');
        if ($level == 'admin') {
            $officers = $this->paginate($this->Officers);
        } else if ($level == 'petugas') {
            $officers = $this->paginate($this->Officers->find('all', ['conditions' => ['OR' => ['id' => $id, 'level' => 'masyarakat']]]));
        } else {
            $officers = $this->Officers->find('all', ['conditions' => ['id =' => $id]]);
            $officers = $this->paginate($officers);
        }


        $this->set(compact('officers'));

        // $query = $this->Officers->find();
        // $officers = $this->paginate($query);

        $this->set(compact('officers'));
    }

    /**
     * View method
     *
     * @param string|null $id Officer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $officer = $this->Officers->get($id, contain: []);
        $this->set(compact('officer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $officer = $this->Officers->newEmptyEntity();
        if ($this->request->is('post')) {
            $officer = $this->Officers->patchEntity($officer, $this->request->getData());
            if ($this->Officers->save($officer)) {
                $this->Flash->success(__('The officer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The officer could not be saved. Please, try again.'));
        }
        $this->set(compact('officer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Officer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $officer = $this->Officers->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $officer = $this->Officers->patchEntity($officer, $this->request->getData());
            if ($this->Officers->save($officer)) {
                $this->Flash->success(__('The officer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The officer could not be saved. Please, try again.'));
        }
        $this->set(compact('officer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Officer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $officer = $this->Officers->get($id);
        $idku = $this->Authentication->getIdentity()->get('id');
        if ($id != $idku) {
            if ($this->Officers->delete($officer)) {
                $this->Flash->success(__('The officer has been deleted.'));
            } else {
                $this->Flash->error(__('The officer could not be deleted. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('Mohon maaf anda tidak bisa menghapus akun anda sendiri, silahkan menghubungi admin untuk konfirmasi hapus data pengguna'));
        }

        // $this->request->allowMethod(['post', 'delete']);
        // $officer = $this->Officers->get($id);
        // if ($this->Officers->delete($officer)) {
        //     $this->Flash->success(__('The officer has been deleted.'));
        // } else {
        //     $this->Flash->error(__('The officer could not be deleted. Please, try again.'));
        // }

        return $this->redirect(['action' => 'index']);
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Officers', 'action' => 'login']);
        }
    }
}
