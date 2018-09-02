<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CommentsBillet Controller
 *
 * @property \App\Model\Table\CommentsBilletTable $CommentsBillet
 *
 * @method \App\Model\Entity\CommentsBillet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommentsBilletController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Billets', 'Users']
        ];
        $commentsBillet = $this->paginate($this->CommentsBillet);

        $this->set(compact('commentsBillet'));
    }

    /**
     * View method
     *
     * @param string|null $id Comments Billet id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $commentsBillet = $this->CommentsBillet->get($id, [
            'contain' => ['Billets', 'Users']
        ]);

        $this->set('commentsBillet', $commentsBillet);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $commentsBillet = $this->CommentsBillet->newEntity();
        if ($this->request->is('post')) {
            $commentsBillet = $this->CommentsBillet->patchEntity($commentsBillet, $this->request->getData());
            if ($this->CommentsBillet->save($commentsBillet)) {
                $this->Flash->success(__('The comments billet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comments billet could not be saved. Please, try again.'));
        }
        $billets = $this->CommentsBillet->Billets->find('list', ['limit' => 200]);
        $users = $this->CommentsBillet->Users->find('list', ['limit' => 200]);
        $this->set(compact('commentsBillet', 'billets', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Comments Billet id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $commentsBillet = $this->CommentsBillet->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $commentsBillet = $this->CommentsBillet->patchEntity($commentsBillet, $this->request->getData());
            if ($this->CommentsBillet->save($commentsBillet)) {
                $this->Flash->success(__('The comments billet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comments billet could not be saved. Please, try again.'));
        }
        $billets = $this->CommentsBillet->Billets->find('list', ['limit' => 200]);
        $users = $this->CommentsBillet->Users->find('list', ['limit' => 200]);
        $this->set(compact('commentsBillet', 'billets', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Comments Billet id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $commentsBillet = $this->CommentsBillet->get($id);
        if ($this->CommentsBillet->delete($commentsBillet)) {
            $this->Flash->success(__('The comments billet has been deleted.'));
        } else {
            $this->Flash->error(__('The comments billet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
