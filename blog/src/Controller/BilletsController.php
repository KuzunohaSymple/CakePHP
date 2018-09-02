<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Billets Controller
 *
 * @property \App\Model\Table\BilletsTable $Billets
 *
 * @method \App\Model\Entity\Billet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BilletsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $billets = $this->paginate($this->Billets);

        $this->set(compact('billets'));
    }

    /**
     * View method
     *
     * @param string|null $id Billet id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $billet = $this->Billets->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('billet', $billet);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $billet = $this->Billets->newEntity();
        if ($this->request->is('post')) {
            $billet = $this->Billets->patchEntity($billet, $this->request->getData());
            $billet->user_id = $this->Auth->User('id');
            if ($this->Billets->save($billet)) {
                $this->Flash->success(__('The billet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The billet could not be saved. Please, try again.'));
        }
        $users = $this->Billets->Users->find('list', ['limit' => 200]);
        $this->set(compact('billet', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Billet id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $billet = $this->Billets->get($id, [
            'contain' => []
        ]);
        $user_id = $this->request->session()->read('Auth.User.id');
        if ($user_id == $billet['user_id']) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                //            if ($user_id == $billet['user_id']) {
                $billet = $this->Billets->patchEntity($billet, $this->request->getData());
                //            if ($user_id == $billet['user_id']) {
                if ($this->Billets->save($billet)) {
                    $this->Flash->success(__('The billet has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The billet could not be saved. Please, try again.'));
            }
        } else {
            $this->Flash->error('You can not edit someone else\'s message');
        }
        $users = $this->Billets->Users->find('list', ['limit' => 200]);
        $this->set(compact('billet', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Billet id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user_id = $this->request->session()->read('Auth.User.id');
        $this->request->allowMethod(['post', 'delete']);
        $billet = $this->Billets->get($id);
        if ($user_id == $billet['user_id']) {
            if ($this->Billets->delete($billet)) {
                $this->Flash->success(__('The billet has been deleted.'));
            } else {
                $this->Flash->error(__('The billet could not be deleted. Please, try again.'));
            }
        }
        else {
            $this->Flash->error('You can\'t delete post other than yourself.');
        }

        return $this->redirect(['action' => 'index']);
    }


}
