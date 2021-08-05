<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShortenUrlCreateRequest;
use App\Services\ShortenUrlService;

/**
 * Class ShortenUrlsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ShortenUrlsController extends Controller
{
    protected $service;

    /**
     * ShortenUrlsController constructor.
     *
     * @param ShortenUrlService $service
     */
    public function __construct(ShortenUrlService $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ShortenUrlCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ShortenUrlCreateRequest $request)
    {
        $shortenUrl = $this->service->create($request->all());

        return response()->json($shortenUrl);
    }

    public function show(string $code) {
        $shortenUrl = $this->service->read($code);

        return redirect()->away($shortenUrl->url);
    }

    public function destroy(int $id) {
        $this->service->delete($id);

        return response()->json();
    }

    public function index(Request $request) {
        $data = $this->service->list($request->all());

        return response()->json($data);
    }
}
