<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Cares Controller
 *
 * @property \App\Model\Table\CaresTable $Cares
 *
 * @method \App\Model\Entity\Care[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CaresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Treatments', 'Durations', 'Prices', 'Payments']
        ];
        $cares = $this->paginate($this->Cares);

        $this->set(compact('cares'));
    }

    /**
     * View method
     *
     * @param string|null $id Care id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $care = $this->Cares->get($id, [
            'contain' => ['Customers', 'Treatments', 'Durations', 'Prices', 'Payments']
        ]);

        $this->set('care', $care);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $care = $this->Cares->newEntity();
        if ($this->request->is('post')) {

            $care = $this->Cares->patchEntity($care, $this->request->getData());
            if ($this->Cares->save($care)) {
                $this->Flash->success(__('The care has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The care could not be saved. Please, try again.'));
        }
        $customers = $this->Cares->Customers->find('list', ['limit' => 200]);
        $treatments = $this->Cares->Treatments->find('list', ['limit' => 200]);
        $durations = $this->Cares->Durations->find('list', ['limit' => 200]);
        $prices = $this->Cares->Prices->find('list', ['limit' => 200]);
        $payments = $this->Cares->Payments->find('list', ['limit' => 200]);
        $this->set(compact('care', 'customers', 'treatments', 'durations', 'prices', 'payments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Care id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $care = $this->Cares->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $care = $this->Cares->patchEntity($care, $this->request->getData());
            if ($this->Cares->save($care)) {
                $this->Flash->success(__('The care has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The care could not be saved. Please, try again.'));
        }
        $customers = $this->Cares->Customers->find('list', ['limit' => 200]);
        $treatments = $this->Cares->Treatments->find('list', ['limit' => 200]);
        $durations = $this->Cares->Durations->find('list', ['limit' => 200]);
        $prices = $this->Cares->Prices->find('list', ['limit' => 200]);
        $payments = $this->Cares->Payments->find('list', ['limit' => 200]);
        $this->set(compact('care', 'customers', 'treatments', 'durations', 'prices', 'payments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Care id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $care = $this->Cares->get($id);
        if ($this->Cares->delete($care)) {
            $this->Flash->success(__('The care has been deleted.'));
        } else {
            $this->Flash->error(__('The care could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * newCare method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newCare()
    {
        $this->viewBuilder()->layout('public');
        $care = $this->Cares->newEntity();
        if ($this->request->is('post')) {
          //return $this->setAction('careDuration'); //redirige vers une methode du même controler
          $session = $this->request->session();
          $session->write('customer_id',$this->request->data['customer_id']);//Write
          $session->write('treatment_id',$this->request->data['treatment_id']);//Write
          //Rechercher dans le nom du treatment choisit
          $users = TableRegistry::get('Treatments');
          $session->write('treatment_title', $users->get($this->request->data['treatment_id'])->title);//Write
          return $this->redirect(['action' => 'careDuration']);
        }
        $treatments = $this->Cares->Treatments->find('list', ['limit' => 200,
      'order' => ['Treatments.Title' => 'ASC']]);
        $this->set(compact('care', 'treatments'));

    }

    public function careDuration()
    {
      $this->viewBuilder()->layout('public');
      $session = $this->request->session();
      $care = $this->Cares->newEntity();
      if ($this->request->is('post')) {

          $care = $this->Cares->patchEntity($care, $this->request->getData());
          if ($this->Cares->save($care)) {
              $this->Flash->success(__('The care has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The care could not be saved. Please, try again.'));
      }

      $prices = $this->Cares->Prices->find('all')
                      ->where(['treatment_id =' => $session->read('treatment_id')])
                      ->contain(['Durations']);
      $treatment = $this->Cares->Treatments->find('all')
                      ->where(['treatment_id =' => $session->read('treatment_id')]);

      $payments = $this->Cares->Payments->find('list', ['limit' => 200]);
      $this->set(compact('care', 'prices', 'treatment', 'payments'));
    }
}
