<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 *
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
{

      public function initialize()
    {
      parent::initialize();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Cares']
        ]);

        $this->set('customer', $customer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $this->set(compact('customer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $this->set(compact('customer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Search method
     */
    public function search($id = null)
    {

      $this->viewBuilder()->setLayout('public');

    }

    /**
     * liste method
     *
     * Method used for the Ajax Customers search list
     */
    public function liste()
    {
        if ($this->request->is('ajax')) {
          $research = $this->request->data['research'];
          $customers = $this->Customers->find('all')
                                       ->where(['OR' => [
                                                    ['last_name LIKE' => '%'.$research.'%'],
                                                    ['first_name LIKE' => '%'.$research.'%'],
                                                    ['phone LIKE' => '%'.$research.'%'],],
                                                    ['id NOT IN' => '1']])
                                       ->limit(5);
          $this->set('customers', $customers);
        }
    }

    /**
     * Search method
     */
    public function newCustomer()
    {
        $this->viewBuilder()->setLayout('public');

        $customer = $this->Customers->newEntity();

        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData(),['validate' => 'Customer']);

            if ($this->Customers->save($customer)) {

                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'search']);
            } 
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }

        $this->set(compact('customer'));

    }
}
