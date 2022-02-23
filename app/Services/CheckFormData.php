<?php

namespace App\Services;

class CheckFormData
{
  /**
     * 性別を判定
     * @param ContactForm $contact
     * @return String 性別
     */
    public static function decideGender($contact): String {
      if ($contact->gender === 0) {
        return '男性';
      }
      if ($contact->gender === 1) {
        return '女性';
      }
    }

    /**
     * 年齢を判定
     * @param ContactForm $contact
     * @return String 年齢層
     */
    public static function decideAge($contact): String {
      if ($contact->age === 0) {
        return '年齢不明';
      }
      if ($contact->age === 1) {
        return '15~19歳';
      }
      if ($contact->age === 2) {
        return '20~24歳';
      }
      if ($contact->age === 3) {
        return '25~29歳';
      }
      if ($contact->age === 4) {
        return '30~34歳';
      }
      if ($contact->age === 5) {
        return '35~歳';
      }
    }
}

?>