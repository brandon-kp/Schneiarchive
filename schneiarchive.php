<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package         PyroCMS
 * @subpackage      Schneiarchive
 * @author          Brandon Probst - brandonkprobst.com
 *
 * Show your blog archives by year and month.
 */

class Widget_Schneiarchive extends Widgets
{
    public $title       = array(
        'en' => 'Archive',
    );
    public $description = array(
        'en' => 'Show your blog archives by year and month, as seen on schneier.org.'
    );
    public $author      = 'Brandon Probst';
    public $website     = 'http://brandonkprobst.com';
    public $version     = '1.0';

    public function run($options)
    {
        $this->load->model('blog/blog_m');
        $this->lang->load('blog/blog');

        $archive_months = $this->blog_m->get_archive_months();
        $date_array     = array();

        foreach($archive_months as $month)
        {
            $date_array[date('Y',$month->date)][] = date('M',$month->date);
        }

        // I feel like there's a better way to do this.
        // But fuck it. We aren't changing our months anytime soon.
        $month_numbers = array('Jan'=>'01','Feb'=>'02','Mar'=>'03','Apr'=>'04','May'=>'05','Jun'=>'06','Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12');

        return array(
            'dates'         => $date_array,
            'month_numbers' => $month_numbers,
        );
    }
}