<?php

namespace App\Http;

class Variables
{
    const HOME_PAGE_COUNT_MOBILITY = 4;
    const TIME_OFFSET = +2;

    const NUMBER_OF_MOBILITY_ITEMS = 8;
    const NUMBER_OF_MOBILITIES_IN_ROW = 4;
    const NUMBER_OF_ARTICLES_IN_ROW = 8;
    const NUMBER_OF_CONTACT_ROW = 2;

    const SEASON_STATUS_PENDING_ID = 1;
    const SEASON_STATUS_ACCEPT = 2;
    const SEASON_STATUS_CANCEL_ID = 3;
    const SEASON_STATUS_DONE = 4;

    const PRESENTATIONS_SAVE_PATH = 'uploads/presentations/';
    const REVIEW_IMAGE_SAVE_PATH = '/uploads/reviews/';
    const REVIEW_THUMB_IMAGE_SAVE_PATH = '/uploads/reviews/thumb/';

    const NUMBER_OF_VISIBLE_REVIEW_PICTURES = 16;

    const REVIEW_THUMB_WIDTH = 150;
    const REVIEW_THUMB_HEIGHT = 113;
    const REVIEW_THUMB_QUALITY = 66;
}