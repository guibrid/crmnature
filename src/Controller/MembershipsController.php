<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Memberships Controller
 *
 * @property \App\Model\Table\MembershipsTable $Memberships
 *
 * @method \App\Model\Entity\Membership[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MembershipsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Packages', 'Payments']
        ];
        $memberships = $this->paginate($this->Memberships);

        $this->set(compact('memberships'));
    }

    /**
     * View method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => ['Packages', 'Payments', 'Customers', 'Cares']
        ]);

        $this->set('membership', $membership);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $membership = $this->Memberships->newEntity();
        if ($this->request->is('post')) {

            $membership = $this->Memberships->patchEntity($membership, $this->request->getData());


            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }
        $packages = $this->Memberships->Packages->find('list', ['limit' => 200]);
        $payments = $this->Memberships->Payments->find('list', ['limit' => 200]);
        $customers = $this->Memberships->Customers->find('list', ['limit' => 200]);
        $this->set(compact('membership', 'packages', 'payments', 'customers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => ['Customers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->getData());
            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }
        $packages = $this->Memberships->Packages->find('list', ['limit' => 200]);
        $payments = $this->Memberships->Payments->find('list', ['limit' => 200]);
        $customers = $this->Memberships->Customers->find('list', ['limit' => 200]);
        $this->set(compact('membership', 'packages', 'payments', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membership = $this->Memberships->get($id);
        if ($this->Memberships->delete($membership)) {
            $this->Flash->success(__('The membership has been deleted.'));
        } else {
            $this->Flash->error(__('The membership could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * New membership
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newMembership()
    {
        $this->viewBuilder()->layout('public');
        $membership = $this->Memberships->newEntity();
        if ($this->request->is('post')) {

            $membership = $this->Memberships->patchEntity($membership, $this->request->getData());

            if ($this->Memberships->save($membership)) {
                //debug($this->set('errors', $membership->errors()));
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }
        $packages = $this->Memberships->Packages->find('list', ['limit' => 200]);
        $payments = $this->Memberships->Payments->find('list')
                                     ->where(['OR' => [
                                                        ['id' => 1], ['id' => 2]
                                                      ]
                                            ]);
        $customers = $this->Memberships->Customers->find('list', ['limit' => 200]);
        $this->set(compact('membership', 'packages', 'payments', 'customers'));
    }
}
