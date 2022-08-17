<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shhsmbt
 */
session_start();

get_header();

global $wp_query;

$wp_query->post_count = 6;

$search = false;

$all_categories = get_categories();


if (isset($_POST['searchFormInput'])) {

    $form_data = array(
        'search' => $_POST['searchFormInput'],
        'categories' => array(),
        'date' => array()
    );


    $categories = array();
    $date_query = array();
    $keyword = $_POST['searchFormInput'];

    $search = true;

    foreach ($_POST as $key => $filter) {
        if ($key !== 'searchFormInput' && $key !== 'date') {
            array_push($categories, $key);
            array_push($form_data['categories'], $key);
        }
    }


    if ($_POST['date']) {
        foreach ($_POST['date'] as $key => $item) {
            switch ($item) {
                case '1month1week':
                    array_push($date_query, array(
                        'before' => '1 week ago',
                        'after' => '1 month ago'
                    ));
                    break;
                case '6month1month':
                    array_push($date_query, array(
                        'before' => '1 month ago',
                        'after' => '6 months ago'
                    ));
                    break;
                case '1year6month':
                    array_push($date_query, array(
                        'before' => '6 months ago',
                        'after' => '1 year ago'
                    ));
                    break;
                case '2year1year':
                    array_push($date_query, array(
                        'before' => '1 year ago',
                        'after' => '2 years ago'
                    ));
                    break;
                case '2year+':
                    array_push($date_query, array(
                        'before' => '2 years ago',
                    ));
                    break;
            }
            array_push($form_data['date'], $item);
        }
    }


    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        's' => $keyword,
        'category__in' => $categories,
        'date_query' => $date_query
    );

    $query = new WP_Query($args);

    $wp_query = $query;


    $_SESSION['form_data'] = serialize($form_data);

}


$pageNum = (get_query_var('paged')) ? get_query_var('paged') : 1;

?>

    <main id="primary" class="site-main blog-posts">
        <?php render_default_header('News and more'); ?>
        <div class="entry-content">
            <div class="cards-section news-cards" style="max-width: 1280px; margin: auto auto 65px">
                <?php
                $idArr = array();

                if (have_posts() && $pageNum === 1 && $search === false) :
                    /* Start the Loop */
                    $p = 0;
                    while (have_posts()) : the_post();

                        if ($p < 2) {
                            array_push($idArr, get_the_ID());
                            $news_bg = ( $p === 0 ) ? 'has-orange-background-color' : 'has-red-background-color';
                            ?>

                            <a class="card carousel-cell pb-0" href="<?php echo get_the_permalink() ?>"
                               style="text-decoration: none; max-width: 100%;">
                                <div class="news-img" style="background:url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>) no-repeat;"></div>
                                <div class="text-container <?php echo $news_bg; ?>">
                                    <h3><?php echo get_the_title() ?></h3>
                                    <p> <?php echo substr(get_the_excerpt(), 0, 75) . '...' ?></p>
                                </div>
                            </a>

                            <?php
                        }

                        $p++;

                    endwhile;
                endif;
                ?>
            </div>
            <div class="articles">
                <div class="template-posts">
                    <?php
                    if (have_posts()) :
                        /* Start the Loop */
                        $y = 0;
                        while (have_posts()) : the_post();
                            $theID = get_the_ID();

                            $post_date = get_the_date('M j, Y');
                            $img = get_the_post_thumbnail_url();

                            if ($idArr[$y] !== $theID) {
                                ?>
                                <div class="large-tiles">
                                    <a href="<?php echo get_the_permalink() ?>">
                                        <?php the_post_thumbnail('template-square'); ?>
                                        <div class="content">
                                            <p><?php echo get_the_category()[0]->name; ?></p>
                                            <?php the_title('<h2>', '</h2>'); ?>
                                            <p>
                                                <?php echo wp_strip_all_tags(substr(get_the_content(), 0, 200)); ?>
                                                ...
                                            </p>
                                            <p> Posted <?php echo $post_date; ?> |
                                                By <?php echo get_the_author(); ?></p>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            }

                            $y++;

                        endwhile;


                    else :

                        get_template_part('template-parts/content', 'none');

                    endif;
                    ?>
                </div>
                <div class="news-sidebar">
                    <form method="POST" action="" id="searchForm">
                        <h3>Search</h3>
                        <div class="search-div">
                            <?php if ($_SESSION['form_data'] !== null): ?>
                                <input type="text" name="searchFormInput" id="searchFormInput"
                                       value="<?php echo unserialize($_SESSION['form_data'])['search'] ?>"/>
                            <?php else: ?>
                                <input type="text" name="searchFormInput" id="searchFormInput" value=""/>
                            <?php endif; ?>
                            <svg style="cursor: pointer" onclick="document.getElementById('searchForm').submit()"
                                 xmlns="http://www.w3.org/2000/svg" width="18.9" height="19.9" viewBox="0 0 18.9 19.9">
                                <path id="Path_209" data-name="Path 209"
                                      d="M18.9,18.148l-3.923-4.13a8.87,8.87,0,0,0,1.664-5.257A8.5,8.5,0,0,0,8.321,0,8.5,8.5,0,0,0,0,8.761a8.5,8.5,0,0,0,8.321,8.761,7.875,7.875,0,0,0,4.992-1.752l3.923,4.13ZM2.377,8.761A6.047,6.047,0,0,1,8.321,2.5a6.047,6.047,0,0,1,5.943,6.258,6.047,6.047,0,0,1-5.943,6.258A6.047,6.047,0,0,1,2.377,8.761Z"
                                      fill="#5a5c62"/>
                            </svg>
                        </div>
                        <h3>Refine your results:</h3>
                        <div class="inner-search-sidebar">
                            <ul style="list-style-type: none">
                                <h6>Article Type</h6>
                                <?php foreach ($all_categories as $key => $cat):
                                    if ($_SESSION['form_data'] !== null) {
                                        $form_data = unserialize($_SESSION['form_data']);
                                        ?>
                                        <li>
                                            <input name="<?php echo $cat->term_id ?>"
                                                   id="<?php echo $cat->term_id ?>"
                                                   onchange="document.getElementById('searchForm').submit()"
                                                   type="checkbox" <?php echo(in_array($cat->term_id, $form_data['categories']) ? 'checked' : '') ?>/>
                                            <label for="<?php echo $cat->term_id ?>"><?php echo $cat->name ?></label>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <input name="<?php echo $cat->term_id ?>"
                                                   onchange="document.getElementById('searchForm').submit()"
                                                   id="<?php echo $cat->term_id ?>"
                                                   type="checkbox"/>
                                            <label for="<?php echo $cat->term_id ?>"><?php echo $cat->name ?></label>
                                        </li>
                                    <?php } ?>

                                <?php endforeach; ?>
                            </ul>
                            <ul class="date-ul" style="list-style-type: none">
                                <?php if ($_SESSION['form_data'] !== null):
                                    $form_data = unserialize($_SESSION['form_data']);
                                    $dates = $form_data['date'];
                                endif; ?>
                                <h6>Published Date</h6>
                                <li>
                                    <input id="date1" name="date[]" type="checkbox" value="1month1week"
                                           onchange="dateSubmit(this)"
                                        <?php echo($dates && in_array('1month1week', $dates) ? 'checked' : ''); ?>
                                    />
                                    <label for="date1">1 month - 1 week ago</label>
                                </li>
                                <li>
                                    <input id="date2" name="date[]" type="checkbox" value="6month1month"
                                           onchange="dateSubmit(this)"
                                        <?php echo($dates && in_array('6month1month', $dates) ? 'checked' : ''); ?>
                                    />
                                    <label for="date2">6 months - 1 month</label>
                                </li>
                                <li>
                                    <input id="date3" name="date[]" type="checkbox" value="1year6month"
                                           onchange="dateSubmit(this)"
                                        <?php echo($dates && in_array('1year6month', $dates) ? 'checked' : ''); ?>
                                    />
                                    <label for="date3">1 year - 6 months ago</label>
                                </li>
                                <li>
                                    <input id="date4" name="date[]" type="checkbox" value="2year1year"
                                           onchange="dateSubmit(this)"
                                        <?php echo($dates && in_array('2year1year', $dates) ? 'checked' : ''); ?>
                                    />
                                    <label for="date4">2 years - 1 year ago</label>
                                </li>
                                <li>
                                    <input id="date5" name="date[]" type="checkbox" value="2year+"
                                           onchange="dateSubmit(this)"
                                        <?php echo($dates && in_array('2year+', $dates) ? 'checked' : ''); ?>
                                    />
                                    <label for="date5">2+ years ago</label>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>

            <div class="pagination-links">
                <?php

                if ($pageNum > 1) { ?>
                    <a href="/news">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28.033" height="22.507"
                             viewBox="0 0 28.033 22.507">
                            <path id="Icon_awesome-angle-double-left" data-name="Icon awesome-angle-double-left"
                                  d="M15.729,16.8l9.563-9.562a1.681,1.681,0,0,1,2.384,0l1.589,1.589a1.681,1.681,0,0,1,0,2.384L22.493,18l6.778,6.778a1.681,1.681,0,0,1,0,2.384l-1.589,1.6a1.681,1.681,0,0,1-2.384,0L15.736,19.2a1.683,1.683,0,0,1-.007-2.391ZM2.229,19.2l9.563,9.563a1.681,1.681,0,0,0,2.384,0l1.589-1.589a1.681,1.681,0,0,0,0-2.384L8.993,18l6.778-6.778a1.681,1.681,0,0,0,0-2.384l-1.589-1.6a1.681,1.681,0,0,0-2.384,0L2.236,16.8A1.683,1.683,0,0,0,2.229,19.2Z"
                                  transform="translate(-1.734 -6.747)" fill="#5a5c62"/>
                        </svg>
                    </a>
                    <a href="<?php echo get_previous_posts_page_link() ?>" style="text-decoration: none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14.533" height="22.507"
                             viewBox="0 0 14.533 22.507">
                            <path id="Icon_awesome-angle-left" data-name="Icon awesome-angle-left"
                                  d="M2.229,16.8l9.563-9.562a1.681,1.681,0,0,1,2.384,0l1.589,1.589a1.681,1.681,0,0,1,0,2.384L8.993,18l6.778,6.778a1.681,1.681,0,0,1,0,2.384l-1.589,1.6a1.681,1.681,0,0,1-2.384,0L2.236,19.2A1.683,1.683,0,0,1,2.229,16.8Z"
                                  transform="translate(-1.734 -6.747)" fill="#5a5c62"/>
                        </svg>
                    </a>

                    <?php
                }

                $ceiling = ($pageNum + 3) < $wp_query->max_num_pages ? ($pageNum + 3) : $wp_query->max_num_pages;


                for ($i = ($pageNum > 4 ? ($pageNum - 4) : 0); $i < $ceiling; $i++) {
                    if ($pageNum === ($i + 1)) {
                        echo '<h5 class="selected-num">' . $pageNum . '</h5>';
                    } else {
                        echo '<a style="text-decoration: none" href="/about-us/news/page/' . ($i + 1) . '"><h5 class="not-selected-num">' . ($i + 1) . '</h5></a>';
                    }
                }


                if ($pageNum !== (int)$wp_query->max_num_pages && $search === false) { ?>
                    <a href="<?php echo get_next_posts_page_link() ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14.533" height="22.507"
                             viewBox="0 0 14.533 22.507">
                            <path id="Icon_awesome-angle-left" data-name="Icon awesome-angle-left"
                                  d="M2.229,16.8l9.563-9.562a1.681,1.681,0,0,1,2.384,0l1.589,1.589a1.681,1.681,0,0,1,0,2.384L8.993,18l6.778,6.778a1.681,1.681,0,0,1,0,2.384l-1.589,1.6a1.681,1.681,0,0,1-2.384,0L2.236,19.2A1.683,1.683,0,0,1,2.229,16.8Z"
                                  transform="translate(16.267 29.253) rotate(180)" fill="#5a5c62"/>
                        </svg>
                    </a>
                    <a href="/news/page/<?php echo $wp_query->max_num_pages ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28.033" height="22.507"
                             viewBox="0 0 28.033 22.507">
                            <path id="Icon_awesome-angle-double-left" data-name="Icon awesome-angle-double-left"
                                  d="M15.729,16.8l9.563-9.562a1.681,1.681,0,0,1,2.384,0l1.589,1.589a1.681,1.681,0,0,1,0,2.384L22.493,18l6.778,6.778a1.681,1.681,0,0,1,0,2.384l-1.589,1.6a1.681,1.681,0,0,1-2.384,0L15.736,19.2a1.683,1.683,0,0,1-.007-2.391ZM2.229,19.2l9.563,9.563a1.681,1.681,0,0,0,2.384,0l1.589-1.589a1.681,1.681,0,0,0,0-2.384L8.993,18l6.778-6.778a1.681,1.681,0,0,0,0-2.384l-1.589-1.6a1.681,1.681,0,0,0-2.384,0L2.236,16.8A1.683,1.683,0,0,0,2.229,19.2Z"
                                  transform="translate(29.767 29.253) rotate(180)" fill="#5a5c62"/>
                        </svg>
                    </a>
                <?php } ?>

            </div>

        </div>
    </main><!-- #primary -->

    <script>
        function dateSubmit(e) {
            document.querySelectorAll('.date-ul>li>input').forEach(c => {
                if (c.value !== e.value) {
                    c.checked = false;
                }
            });

            document.getElementById('searchForm').submit();
        }
    </script>

<?php
get_footer();
