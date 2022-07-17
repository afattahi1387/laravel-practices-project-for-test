<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;

class VotesController extends Controller
{
    public function add_vote($article_id, $vote) {
        Vote::create([
            'article_id' => $article_id,
            'vote' => $vote
        ]);

        return redirect()->route('single.article', ['article_id' => $article_id]);
    }

    public function add_great_vote($article_id) {
        $add_vote = self::add_vote($article_id, 'great');
        return $add_vote;
    }

    public function add_dont_bad_vote($article_id) {
        $add_vote = self::add_vote($article_id, 'dont_bad');
        return $add_vote;
    }

    public function add_bad_vote($article_id) {
        $add_vote = self::add_vote($article_id, 'bad');
        return $add_vote;
    }
}
