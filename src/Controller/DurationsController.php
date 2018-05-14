<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Durations Controller
 *
 * @property \App\Model\Table\DurationsTable $Durations
 *
 * @method \App\Model\Entity\Duration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DurationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Treatments']
        ];
        $durations = $this->paginate($this->Durations);

        $this->set(compact('durations'));
    }

    /**
     * View method
     *
     * @param string|null $id Duration id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $duration = $this->Durations->get($id, [
            'contain' => ['Treatments', 'Cares', 'Prices']
        ]);

        $this->set('duration', $duration);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $duration = $this->Durations->newEntity();
        if ($this->request->is('post')) {
            $duration = $this->Durations->patchEntity($duration, $this->request->getData());
            if ($this->Durations->save($duration)) {
                $this->Flash->success(__('The duration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The duration could not be saved. Please, try again.'));
        }
        $treatments = $this->Durations->Treatments->find('list', ['limit' => 200]);
        $this->set(compact('duration', 'treatments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Duration id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $duration = $this->Durations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $duration = $this->Durations->patchEntity($duration, $this->request->getData());
            if ($this->Durations->save($duration)) {
                $this->Flash->success(__('The duration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The duration could not be saved. Please, try again.'));
        }
        $treatments = $this->Durations->Treatments->find('list', ['limit' => 200]);
        $this->set(compact('duration', 'treatments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Duration id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $duration = $this->Durations->get($id);
        if ($this->Durations->delete($duration)) {
            $this->Flash->success(__('The duration has been deleted.'));
        } else {
            $this->Flash->error(__('The duration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
