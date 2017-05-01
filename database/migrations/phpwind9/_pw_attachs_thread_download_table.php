<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*

DROP TABLE IF EXISTS `pw_attachs_thread_download`;
CREATE TABLE `pw_attachs_thread_download` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增长ID',
  `aid` int(10) unsigned NULL DEFAULT '0' COMMENT '附件aid',
  `created_userid` int(10) unsigned NULL DEFAULT '0' COMMENT '下载人',
  `created_time` int(10) unsigned NULL DEFAULT '0' COMMENT '下载时间',
  `cost` mediumint(8) unsigned NULL DEFAULT '0' COMMENT '花费积分数量',
  `ctype` tinyint(3) unsigned NULL DEFAULT '0' COMMENT '花费积分类型',
  PRIMARY KEY (`id`),
  KEY `idx_aid` (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='帖子附件下载记录' ;

 */

class PwAttachsThreadDownloadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function run()
    {
        Schema::create('pw_attachs_thread_download', function (Blueprint $table) {
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
        Schema::dropIfExists('pw_attachs_thread_download');
    }
}

