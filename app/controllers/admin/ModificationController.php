<?php


namespace app\controllers\admin;
use app\models\admin\Modification;
use app\models\AppModel;
use ishop\libs\Pagination;

class ModificationController extends AppController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;
        $count = \R::count('order_mod');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $modification = \R::getAll("SELECT * from order_mod  LIMIT $start, $perpage");
        $this->setMeta('Список модификаций');
        $this->set(compact('modification', 'pagination', 'count'));
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            $modification = new Modification();
            $data = $_POST;
            $modification->load($data);


            if (!$modification->validate($data)) {
                $modification->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if ($id = $modification->save('order_mod', false)) {


                $_SESSION['success'] = 'Модификация добавлена';
            }
            redirect();
        }

        $this->setMeta('Новая модификация');
    }

    public function editAction()
    {
        if (!empty($_POST)) {

            $id = $this->getRequestID(false);
            $modification = new Modification();
            $data = $_POST;

            $modification->load($data);


            if ($modification->update('order_mod', $id)) {
                $modification = \R::load('order_mod', $id);
                \R::store($modification);
                $_SESSION['success'] = 'Изменения сохранены';
                redirect();
            }
        }

        $id = $this->getRequestID(true);

        $modification = \R::load('order_mod', $id);
        $this->setMeta("Редактирование Характеристики {$modification->title}");
        $this->set(compact('modification'));

    }

       public function modificationProductAction()
        {
            /*$data = [
                'items' => [
                    [
                        'id' => 1,
                        'text' => 'Товар 1',
                    ],
                    [
                        'id' => 2,
                        'text' => 'Товар 2',
                    ],
                ]
            ];*/

            $q = isset($_GET['q']) ? $_GET['q'] : '';
            $data['items'] = [];
            $products = \R::getAssoc('SELECT id, title FROM order_mod WHERE title LIKE ? LIMIT 10', ["%{$q}%"]);
            if ($products) {
                $i = 0;
                foreach ($products as $id => $title) {
                    $data['items'][$i]['id'] = $id;
                    $data['items'][$i]['text'] = $title;
                    $i++;
                }
            }
            echo json_encode($data);
            die;
        }

}