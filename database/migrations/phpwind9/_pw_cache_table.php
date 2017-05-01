<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*

DROP TABLE IF EXISTS `pw_cache`;
CREATE TABLE `pw_cache` (
  `cache_key` char(32) NOT NULL COMMENT '缓存键名MD5值',
  `cache_value` text COMMENT '缓存值',
  `cache_expire` int(10) unsigned NULL DEFAULT '0' COMMENT '缓存过期时间',
  PRIMARY KEY (`cache_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='缓存表';

 */

class PwCacheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function run()
    {
        Schema::create('pw_cache', function (Blueprint $table) {
            if (env('DB_CONNECTION', false) === 'mysql') {
                $table->engine = 'InnoDB';
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pw_cache');
    }
}

