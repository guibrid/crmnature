<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Prices Controller
 *
 * @property \App\Model\Table\PricesTable $Prices
 *
 * @method \App\Model\Entity\Price[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PricesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Treatments', 'Durations']
        ];
        $prices = $this->paginate($this->Prices);

        $this->set(compact('prices'));
    }

    /**
     * View method
     *
     * @param string|null $id Price id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $price = $this->Prices->get($id, [
            'contain' => ['Treatments', 'Durations', 'Cares']
        ]);

        $this->set('price', $price);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $price = $this->Prices->newEntity();
        if ($this->request->is('post')) {
            $price = $this->Prices->patchEntity($price, $this->request->getData());
            if ($this->Prices->save($price)) {
                $this->Flash->success(__('The price has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The price could not be saved. Please, try again.'));
        }
        $treatments = $this->Prices->Treatments->find('list', ['limit' => 200]);
        $durations = $this->Prices->Durations->find('list', ['limit' => 200]);
        $this->set(compact('price', 'treatments', 'durations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Price id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $price = $this->Prices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $price = $this->Prices->patchEntity($price, $this->request->getData());
            if ($this->Prices->save($price)) {
                $this->Flash->success(__('The price has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The price could not be saved. Please, try again.'));
        }
        $treatments = $this->Prices->Treatments->find('list', ['limit' => 200]);
        $durations = $this->Prices->Durations->find('list', ['limit' => 200]);
        $this->set(compact('price', 'treatments', 'durations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Price id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $price = $this->Prices->get($id);
        if ($this->Prices->delete($price)) {
            $this->Flash->success(__('The price has been deleted.'));
        } else {
            $this->Flash->error(__('The price could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



    public function liste()
{

    // Si c'est une requête AJAX
    if($this->request->is('ajax')) {
        // Force le controller à rendre une réponse JSON.
        $this->RequestHandler->renderAs($this, 'json');
        // Définit le type de réponse de la requete AJAX
        $this->response->type('application/json');
        // Find pour récupérer les pays de la bonne région
        //$response = $this->Countries->find('all')->where(['id'=>$idCountry])->contain(['Regions']);
        $treatment_id = $this->request->data['treatment_id'];
        $duration_id = $this->request->data['duration_id'];
        $response = $this->Prices->find('list')
                                   ->where(['treatment_id =' => $treatment_id,
                                            'duration_id =' => $duration_id]);
        // Chargement du layout AJAX
        $this->viewBuilder()->layout('ajax');
        // Créer un contexte countries à renvoyer
        $this->set('price',$response);
        // Généreration des vues de données
        $this->set('_serialize', ['price']);

    } else {
      throw new NotFoundException(__('Article not found'));
    }
}
}
