<?php


namespace App\Controller;


use App\Entity\MovieList;
use App\Entity\User;
use App\Form\CreateListFormType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManager;
use App\Form\DeleteListFormType;

class MovieListController extends AbstractController
{

    /**
     * @Route ("/lists/show", name="mylists")
     */
    public function displayMyLists() {
        $user = $this->getUser();
        $listes = $user->getMovieLists();

        return $this->render('lists/alllists.html.twig', ['lists' => $listes,]);


//
//
//        $i = 0;
//        while ($i < count($listes)) {
//            array[$i] = $listes[$i]->getListeName()
//            $j = 0;
//            echo $listes[$i]->getListeName() . "<br />";
//            $content = $listes[$i]->getListcontent();
//
//            while($j < count($content)) {
//                echo $content[$j] . $this->getMovieName($content[$j]) . "<br />";
//                $j++;
//            }
//            $i++;
//        }
//
//        exit(0);
    }

    /**
     * @Route ("/lists/content", name="listdetails")
     */
    public function displayListContent() {

        if (isset($_GET['listId'])) {

            $i = 0;

            $listId = $_GET['listId'];
            $user = $this->getUser();
            $entityManager = $this->getDoctrine()->getManager();
            $list = $entityManager->getRepository(MovieList::class)->findOneBy(['user' => $user, 'id' => $listId]);

            $movies = $list->getListcontent();
            $content = array();

            while ($i < count($movies)) {
                $content[$i]['id'] = $movies[$i];
                $content[$i]['title'] = $this->getMovieName($movies[$i]);
                $i++;
            }

            return $this->render('lists/listdetails.html.twig', ['list' => $list, 'content' => $content]);

        } else {
            return $this->render('pages/home.html.twig');
        }

    }

    /**
     * @Route ("/lists/add", name="addlist")
     */
    public function addList(Request $request){
        $user = $this->getUser();
        $list = new MovieList();
        $form = $this->createForm(CreateListFormType::class, $list);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $list->setUser($user);
            $list->setCreatedAt(new \DateTime());
            $list->setUpdatedAt(new \DateTime());
            $list->setListcontent([]);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($list);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->render('pages/home.html.twig');
        } else {
            return $this->render('lists/newlist.html.twig', [
                'CreateListForm' => $form->createView(),
            ]);
        }
    }

    /**
     * @Route ("/lists/addto", name="addtolist")
     */
    public function addToList() {
        // Variables
        // movieId : movie to add to the list
        // listId : id of the concerned list
        // /lists/add?movieId=550&listId=4


        if (isset($_GET['movieId']) && isset($_GET['listId'])) {
            $movieId = $_GET['movieId'];
            $listId = $_GET['listId'];
            $user = $this->getUser();

            $entityManager = $this->getDoctrine()->getManager();
            $list = $entityManager->getRepository(MovieList::class)->findOneBy(['user' => $user, 'id' => $listId]);

            $listContent = $list->getListcontent();
            array_push($listContent, $movieId);

            $list->setListcontent($listContent);
            $list->setUpdatedAt(new \DateTime());

            $entityManager->persist($list);
            $entityManager->flush();

            return $this->redirect('/movies/detail?movieid=' . $movieId);
        }

        return $this->redirect('/movies/detail?movieid=' . $movieId);
    }


    /**
     * @Route ("/lists/remove", name="removefromlist")
     */
    public function removeFromList() {

        if (isset($_GET['movieId']) && isset($_GET['listId'])) {
            $movieId = $_GET['movieId'];
            $listId = $_GET['listId'];
            $user = $this->getUser();

            $entityManager = $this->getDoctrine()->getManager();
            $list = $entityManager->getRepository(MovieList::class)->findOneBy(['user' => $user, 'id' => $listId]);

            $listContent = $list->getListcontent();

            $tmp = array();
            $i = 0;
            $j = 0;

            while($i < count($listContent)) {
                if ($listContent[$i] != $movieId) {
                    $tmp[$j] = $listContent[$i];
                    $j++;
                }
                $i++;
            }


            $list->setListcontent($tmp);
            $list->setUpdatedAt(new \DateTime());

            $entityManager->persist($list);
            $entityManager->flush();

            return $this->redirect('/lists/content?listId=' . $listId);
        }

        return $this->redirect('/lists/content?listId=' . $listId);
    }


    /**
     * @Route ("/lists/delete", name="deletelist")
     */
    public function listDelete(Request $request) {

        if(isset($_POST['id'])) {
            $listId = $_POST['id'];
        } else {
            return $this->redirect('/lists/show');
        }

        $entityManager = $this->getDoctrine()->getManager();
        $list = $entityManager->getRepository(MovieList::class)->findOneBy(['id' => $listId]);

        if($list->getListename() != 'Favorites'){
            $entityManager->remove($list);
            $entityManager->flush();
            return $this->redirectToRoute('mylists');
        } else {
            return $this->redirectToRoute('mylists');
        }
    }


    public function getMovieName($_id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/" . $_id . "?api_key=8125d567a7173d78f1ed3287871171e4&language=en-US",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $movie = json_decode($response);
            return $movie->title;
        }

    }






}