<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\BatteryLogForm;
use AppBundle\Form\Handler\BasicFormHandler;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Repository\BatteryLogRepository;

/**
 * Controller class to deal with BatteryLog entity
 *
 * @Route("/battery")
 */
class BatteryLogController extends Controller
{
    /**
     * Add new log about recycled batteries
     *
     * @Route("/add/", name="app_battery_log_add")
     *
     * @param Request $request
     * @param BasicFormHandler $handler
     * @param ObjectManager $em
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request, BasicFormHandler $handler, ObjectManager $em)
    {
        $form = $this->createForm(BatteryLogForm::class);

        if ($log = $handler->handle($form, $request)) {
            $em->persist($log);
            $em->flush();

            return $this->redirectToRoute('app_battery_log_index');
        }

        return $this->render('/battery/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="app_battery_log_index")
     *
     * @param BatteryLogRepository $repo
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(BatteryLogRepository $repo)
    {
        $records = $repo->findAggregatedCountGroupedByType();

        return $this->render('/battery/index.html.twig', [
            'records' => $records,
        ]);
    }
}
