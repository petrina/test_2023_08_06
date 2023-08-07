<?php

require_once 'dto/ResponseDTO.php';
require_once "classes/Image.php";

class BannerService {

    private VisitorRepository $visitorRepository;
    private Request $request;

    public function __construct(
        VisitorRepository $visitorRepository,
        Request $request
    ) {
        $this->visitorRepository = $visitorRepository;
        $this->request = $request;
    }

    public function action() {

        if ($this->visitorRepository->exist(
            $this->request->userAgent(),
            $this->request->ip(),
            $this->request->query('page')
        )) {
            $this->visitorRepository->incrementView(
                $this->request->userAgent(),
                $this->request->ip(),
                $this->request->query('page')
            );
        } else {
            $this->visitorRepository->create([
                'ip_address' => $this->request->ip(),
                'user_agent' => $this->request->userAgent(),
                'view_date' => date('Y-m-d H:i:s'),
                'page_url' => $this->request->query('page'),
                'views_count' => 1,
            ]);
        }


        $image = new Image();
        $image->read("images/image.png");

        return new ResponseDTO(
            $image->getImg(),
            [$image->getHeader()]
        );
    }
}