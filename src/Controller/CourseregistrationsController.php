<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Courseregistrations Controller
 *
 * @property \App\Model\Table\CourseregistrationsTable $Courseregistrations
 *
 * @method \App\Model\Entity\Courseregistration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CourseregistrationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Courses', 'Candidates', 'Centers']
        ];
        $courseregistrations = $this->paginate($this->Courseregistrations);

        $this->set(compact('courseregistrations'));
    }

    /**
     * View method
     *
     * @param string|null $id Courseregistration id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $courseregistration = $this->Courseregistrations->get($id, [
            'contain' => ['Courses', 'Candidates', 'Centers']
        ]);

        $this->set('courseregistration', $courseregistration);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $courseregistration = $this->Courseregistrations->newEntity();
        if ($this->request->is('post')) {
            $courseregistration = $this->Courseregistrations->patchEntity($courseregistration, $this->request->getData());
            if ($this->Courseregistrations->save($courseregistration)) {
                $this->Flash->success(__('The courseregistration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The courseregistration could not be saved. Please, try again.'));
        }
        $courses = $this->Courseregistrations->Courses->find('list', ['limit' => 200]);
        $candidates = $this->Courseregistrations->Candidates->find('list', ['limit' => 200]);
        $centers = $this->Courseregistrations->Centers->find('list', ['limit' => 200]);
        $this->set(compact('courseregistration', 'courses', 'candidates', 'centers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Courseregistration id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $courseregistration = $this->Courseregistrations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $courseregistration = $this->Courseregistrations->patchEntity($courseregistration, $this->request->getData());
            if ($this->Courseregistrations->save($courseregistration)) {
                $this->Flash->success(__('The courseregistration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The courseregistration could not be saved. Please, try again.'));
        }
        $courses = $this->Courseregistrations->Courses->find('list', ['limit' => 200]);
        $candidates = $this->Courseregistrations->Candidates->find('list', ['limit' => 200]);
        $centers = $this->Courseregistrations->Centers->find('list', ['limit' => 200]);
        $this->set(compact('courseregistration', 'courses', 'candidates', 'centers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Courseregistration id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $courseregistration = $this->Courseregistrations->get($id);
        if ($this->Courseregistrations->delete($courseregistration)) {
            $this->Flash->success(__('The courseregistration has been deleted.'));
        } else {
            $this->Flash->error(__('The courseregistration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
