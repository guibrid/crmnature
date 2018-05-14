<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Treatments Controller
 *
 * @property \App\Model\Table\TreatmentsTable $Treatments
 *
 * @method \App\Model\Entity\Treatment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TreatmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $treatments = $this->paginate($this->Treatments);

        $this->set(compact('treatments'));
    }

    /**
     * View method
     *
     * @param string|null $id Treatment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treatment = $this->Treatments->get($id, [
            'contain' => ['Cares', 'Durations', 'Prices']
        ]);

        $this->set('treatment', $treatment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $treatment = $this->Treatments->newEntity();
        if ($this->request->is('post')) {
            $treatment = $this->Treatments->patchEntity($treatment, $this->request->getData());
            if ($this->Treatments->save($treatment)) {
                $this->Flash->success(__('The treatment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The treatment could not be saved. Please, try again.'));
        }
        $this->set(compact('treatment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Treatment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treatment = $this->Treatments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treatment = $this->Treatments->patchEntity($treatment, $this->request->getData());
            if ($this->Treatments->save($treatment)) {
                $this->Flash->success(__('The treatment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The treatment could not be saved. Please, try again.'));
        }
        $this->set(compact('treatment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Treatment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treatment = $this->Treatments->get($id);
        if ($this->Treatments->delete($treatment)) {
            $this->Flash->success(__('The treatment has been deleted.'));
        } else {
            $this->Flash->error(__('The treatment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
