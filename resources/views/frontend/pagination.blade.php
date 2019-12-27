<?php
// config
$link_limit = 20; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>
@if ($paginator->last_page > 1)
    <ul class="pagination">
        <li class="{{ ($paginator->current_page == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url(1) }}"><i class="fas fa-angle-double-left"></i></a>
         </li>
        @for ($i = 1; $i <= $paginator->last_page; $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->current_page - $half_total_links;
            $to = $paginator->current_page + $half_total_links;
            if ($paginator->current_page < $half_total_links) {
               $to += $half_total_links - $paginator->current_page;
            }
            if ($paginator->last_page - $paginator->current_page < $half_total_links) {
                $from -= $half_total_links - ($paginator->last_page - $paginator->current_page) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="{{ ($paginator->current_page == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        <li class="{{ ($paginator->current_page == $paginator->last_page) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->last_page) }}"><i class="fas fa-angle-double-right"></i></a>
        </li>
    </ul>
@endif
