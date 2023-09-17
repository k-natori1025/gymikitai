<?php

namespace App\Services;

class CheckStoreService
{
  public static function checkTwentyfour($store) {
    if($store->twentyfour === 1) {
      $businessHour = '24時間営業です';
    } else {
      $businessHour = '24時間営業ではありません';
    }
    return $businessHour;
  }

  public static function checkTerm($store) {
    if($store->term == 1) { $term = "1ヶ月で"; }
    if($store->term == 2) { $term = "3ヶ月で"; }
    if($store->term == 3) { $term = "半年で"; }
    if($store->term == 4) { $term = "1年で"; }
    // else { $term = ""; }

    return $term;
  }

  public static function checkVisitor($store) {
    if($store->visitor === 1) {
      $visitor = 'ビジター利用可能です';
    } else {
      $visitor = 'ビジター利用できません';
    }
    return $visitor;
  }

  public static function checkPool($store) {
    if($store->pool === 1) {
      $pool = '◯';
    } else {
      $pool = '-';
    }
    return $pool;
  }

  public static function checkSauna($store) {
    if($store->sauna === 1) {
      $sauna = '◯';
    } else {
      $sauna = '-';
    }
    return $sauna;
  }

  public static function checkShower($store) {
    if($store->shower === 1) {
      $shower = '◯';
    } else {
      $shower = '-';
    }
    return $shower;
  }

  public static function checkWifi($store) {
    if($store->wifi === 1) {
      $wifi = '◯';
    } else {
      $wifi = '-';
    }
    return $wifi;
  }
}