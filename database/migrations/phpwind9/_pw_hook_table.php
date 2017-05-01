<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*

DROP TABLE IF EXISTS `pw_hook`;
CREATE TABLE `pw_hook` (
  `name` varchar(50) NOT NULL,
  `app_id` char(20) NULL DEFAULT '' COMMENT '应用id',
  `app_name` varchar(100) NULL DEFAULT '' COMMENT '应用名称',
  `created_time` int(10) unsigned NULL DEFAULT '0' COMMENT '创建时间',
  `modified_time` int(10) unsigned NULL DEFAULT '0' COMMENT '修改时间',
  `document` text COMMENT '钩子详细信息',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='钩子基本信息表';

 */

class PwHookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function run()
    {
        Schema::create('pw_hook', function (Blueprint $table) {
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
        Schema::dropIfExists('pw_hook');
    }
}

