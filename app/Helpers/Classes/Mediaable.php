<?php

namespace App\Helpers\Classes;

use Illuminate\Http\Request;

/**
 * Class Mediaable
 *
 * @package \App\Helpers\Classes
 */
class Mediaable
{

    /**
     * @var Request
     */
    private Request $request;
    /**
     * @var string
     */
    private string $move_to = 'uploads';
    /**
     * @var string
     */
    private string $path = '';


    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $dir
     * @return $this
     */
    public function moveToDir(string $dir): static
    {
        $this->move_to = $dir;
        return $this;
    }

    /**
     * @param string $name
     * @return Mediaable
     */
    public function getMediaFromRequestByName(string $name): Mediaable
    {
        if ($this->request->file($name)->store('public/' . $this->move_to)) {
            $this->path = $this->request->file($name)->store('public/' . $this->move_to);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getMediaNameAfterUpload(): string
    {
        return str_replace('public/', '', $this->path);
    }


}
