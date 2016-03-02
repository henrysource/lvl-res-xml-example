<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use SoapBox\Formatter\Formatter;

class ApiController extends Controller
{
    public function index()
    {
        $formatter = Formatter::make($this->sampleData(), Formatter::ARR);
        return Response::make($formatter->toXml(), '200')->header('Content-Type', 'text/xml');   
    }


    public function show($id)
    {

        $formatter = Formatter::make($this->sampleData($id), Formatter::ARR);
        return Response::make($formatter->toXml(), '200')->header('Content-Type', 'text/xml');   
    }

    private function sampleData($id = null) 
    {

        $products = collect([
                ['id' => '1', 'title' => 'product1', 'price' => 100, 'intro' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore quod iste ipsam praesentium sed doloremque necessitatibus recusandae debitis dolorum, minus fuga magni aliquid ipsa autem, provident ea! Placeat, quo, temporibus?'],
                ['id' => '2', 'title' => 'product2', 'price' => 101, 'intro' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione eligendi id incidunt fugit error corrupti molestias iusto, odit, tempore impedit, quaerat veritatis amet eius? Totam possimus nisi, quo mollitia officiis.'],
                ['id' => '3', 'title' => 'product3', 'price' => 102, 'intro' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate labore illo error, dolore explicabo autem expedita veritatis ea nostrum iusto voluptatem inventore, ex voluptatibus beatae enim voluptates ullam saepe molestiae.'],
                ['id' => '4', 'title' => 'product4', 'price' => 103, 'intro' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum odit saepe possimus fugit necessitatibus dignissimos soluta placeat temporibus, molestiae nam veritatis minima distinctio eveniet similique velit iste quidem deleniti dicta.'],
            ]);

        // dd($products);

        if($id != null) {
            $products = $products->where('id', $id);
        }

        return $products;
    }

}
