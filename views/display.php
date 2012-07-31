<?php if($dates): ?>
    <table>
        <?php foreach($dates as $year=>$months): ?>
            <tr>
                <td><strong><?php echo $year;?>&nbsp;</strong></td>

                <?php foreach(array_reverse($months) as $month): ?>
                    <td>
                        <a href="<?php echo site_url('blog/archive/'.$year.'/'.$month_numbers[$month]);?>"><?php echo substr($month, 0, 1);?>&nbsp;</a>
                    </td>
                <?php endforeach;?>
            </tr>
        <?php endforeach;?>
    </table>
<?php endif; ?>