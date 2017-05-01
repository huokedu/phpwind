<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*

DROP TABLE IF EXISTS `pw_user_active_code`;
CREATE TABLE `pw_user_active_code` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户ID',
  `email` varchar(80) NULL DEFAULT '' COMMENT 'Email地址',
  `code` varchar(10) NULL DEFAULT '' COMMENT '激活码',
  `send_time` int(10) unsigned NULL DEFAULT '0' COMMENT '发送时间',
  `active_time` int(10) unsigned NULL DEFAULT '0' COMMENT '激活时间',
  `typeid` tinyint(1) NULL DEFAULT '0' COMMENT '类型-注册邮箱激活码或是找回密码',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户邮箱激活码表';

 */

class PwUserActiveCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function run()
    {
        Schema::create('pw_user_active_code', function (Blueprint $table) {
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
        Schema::dropIfExists('pw_user_active_code');
    }
}

