<ul class="pager">
    <li class="previous">
    <?php if ($previous_page !== FALSE): ?>
        <a href="<?php echo HTML::chars($page->url($previous_page)) ?>" rel="prev">&larr; Назад</a>
    <?php endif ?>
    </li>
    <li class="next">
    <?php if ($next_page !== FALSE): ?>
        <a href="<?php echo HTML::chars($page->url($next_page)) ?>" rel="next">Вперед &rarr;</a>
    <?php endif ?>
    </li>
</ul>