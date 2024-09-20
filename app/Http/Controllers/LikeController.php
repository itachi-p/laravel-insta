<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
   private $like;

   public function __construct(Like $like)
   {
       $this->like = $like;
   }
}
