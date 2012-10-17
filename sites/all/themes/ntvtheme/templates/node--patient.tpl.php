<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php // print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php  print $content_attributes; ?> >
    <?php
      // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        //print render($content);
        // print_r(array_keys($content)); 
    ?>

  <?php 
    /*IMPORTANT NOTES:

    - If a level-1 field like 'Mental Status' is not available then, its corresponding level-3 fields are not displayed
    - In exceptional cases, if a level-1 field is not available and if corresponding level-3 fields are available then,
      one of the level-3 videos is to be uploaded to the level-1 field (as this is an exception) to display level-3 fields.
    - Level-2 fields can be uploaded but, currently they are not part of the display on frontend.
    - Thumbnails are not generated for level-1 fields as the videos associated with these fields are usually over 70 MB
      */
  ?>

<!-- MENTAL STATUS -->
    <?php if($content['field_video_mental_status']!=NULL) {
      print render($content['field_video_mental_status']);
     } ?>

    <?php if($content['field_video_mental_status']!=NULL) { ?>
        <ul class="horizontalcarousel jcarousel-skin-default">
          <?php if($content['field_ms_ori_01']!=NULL) { ?>
                    <li><?php print render($content['field_ms_ori_01']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_mem_01']!=NULL) { ?>
                    <li><?php print render($content['field_ms_mem_01']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_mem_02']!=NULL) { ?>
                    <li><?php print render($content['field_ms_mem_02']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_mem_03']!=NULL) { ?>
                    <li><?php print render($content['field_ms_mem_03']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_mem_04']!=NULL) { ?>
                    <li><?php print render($content['field_ms_mem_04']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_att_01']!=NULL) { ?>
                    <li><?php print render($content['field_ms_att_01']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_att_02']!=NULL) { ?>
                    <li><?php print render($content['field_ms_att_02']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_cal_01']!=NULL) { ?>
                    <li><?php print render($content['field_ms_cal_01']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_cal_02']!=NULL) { ?>
               <li><?php print render($content['field_ms_cal_02']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_cal_03']!=NULL) { ?>
               <li><?php print render($content['field_ms_cal_03']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_exe_01']!=NULL) { ?>
               <li><?php print render($content['field_ms_exe_01']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_exe_02']!=NULL) { ?>
                <li><?php print render($content['field_ms_exe_02']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_lng_01']!=NULL) { ?>
               <li><?php print render($content['field_ms_lng_01']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_lng_02']!=NULL) { ?>
               <li><?php print render($content['field_ms_lng_02']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_lng_03']!=NULL) { ?>
              <li><?php print render($content['field_ms_lng_03']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_lng_04']!=NULL) { ?>
              <li><?php print render($content['field_ms_lng_04']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_lng_05']!=NULL) { ?>
              <li><?php print render($content['field_ms_lng_05']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_lng_06']!=NULL) { ?>
              <li><?php print render($content['field_ms_lng_06']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_lng_07']!=NULL) { ?>
              <li><?php print render($content['field_ms_lng_07']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_lng_08']!=NULL) { ?>
              <li><?php print render($content['field_ms_lng_08']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_cop_01']!=NULL) { ?>
              <li><?php print render($content['field_ms_cop_01']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_cop_02']!=NULL) { ?>
              <li><?php print render($content['field_ms_cop_02']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_art_01']!=NULL) { ?>
              <li><?php print render($content['field_ms_art_01']); ?></li>
          <?php } ?>
          <?php if($content['field_ms_art_02']!=NULL) { ?>
              <li><?php print render($content['field_ms_art_02']); ?></li>
          <?php } ?>
    </ul>
    <?php jcarousel_add('horizontalcarousel'); ?>
  <?php } ?>



  <!-- CRANIAL NERVE -->
    <?php if($content['field_video_cranial_nerve']!=NULL) {
      print render($content['field_video_cranial_nerve']);
     } ?>

    <?php if($content['field_video_cranial_nerve']!=NULL) { ?>
        <ul class="horizontalcarousel jcarousel-skin-default">
          <?php if($content['field_cn_002_01']!=NULL) { ?>
                    <li><?php print render($content['field_cn_002_01']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_002_02']!=NULL) { ?>
                    <li><?php print render($content['field_cn_002_02']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_002_03']!=NULL) { ?>
                    <li><?php print render($content['field_cn_002_03']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_002_04']!=NULL) { ?>
                    <li><?php print render($content['field_cn_002_04']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_002_05']!=NULL) { ?>
                    <li><?php print render($content['field_cn_002_05']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_002_06']!=NULL) { ?>
                    <li><?php print render($content['field_cn_002_06']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_002_07']!=NULL) { ?>
                    <li><?php print render($content['field_cn_002_07']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_003_1']!=NULL) { ?>
                    <li><?php print render($content['field_cn_003_1']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_003_2']!=NULL) { ?>
                    <li><?php print render($content['field_cn_003_2']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_003_3']!=NULL) { ?>
                    <li><?php print render($content['field_cn_003_3']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_003_4']!=NULL) { ?>
                    <li><?php print render($content['field_cn_003_4']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_003_5']!=NULL) { ?>
                    <li><?php print render($content['field_cn_003_5']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_003_6']!=NULL) { ?>
                    <li><?php print render($content['field_cn_003_6']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_003_7']!=NULL) { ?>
                    <li><?php print render($content['field_cn_003_7']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_003_8']!=NULL) { ?>
                    <li><?php print render($content['field_cn_003_8']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_003_9']!=NULL) { ?>
                    <li><?php print render($content['field_cn_003_9']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_003_10']!=NULL) { ?>
                    <li><?php print render($content['field_cn_003_10']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_005_1']!=NULL) { ?>
                    <li><?php print render($content['field_cn_005_1']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_005_2']!=NULL) { ?>
                    <li><?php print render($content['field_cn_005_2']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_005_3']!=NULL) { ?>
                    <li><?php print render($content['field_cn_005_3']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_005_4']!=NULL) { ?>
                    <li><?php print render($content['field_cn_005_4']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_005_5']!=NULL) { ?>
                    <li><?php print render($content['field_cn_005_5']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_005_6']!=NULL) { ?>
                    <li><?php print render($content['field_cn_005_6']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_005_7']!=NULL) { ?>
                    <li><?php print render($content['field_cn_005_7']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_005_8']!=NULL) { ?>
                    <li><?php print render($content['field_cn_005_8']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_1']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_1']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_2']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_2']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_3']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_3']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_4']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_4']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_5']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_5']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_6']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_6']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_7']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_7']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_8']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_8']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_9']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_9']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_10']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_10']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_11']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_11']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_12']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_12']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_13']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_13']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_007_14']!=NULL) { ?>
                    <li><?php print render($content['field_cn_007_14']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_008_1']!=NULL) { ?>
                    <li><?php print render($content['field_cn_008_1']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_008_2']!=NULL) { ?>
                    <li><?php print render($content['field_cn_008_2']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_008_3']!=NULL) { ?>
                    <li><?php print render($content['field_cn_008_3']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_008_4']!=NULL) { ?>
                    <li><?php print render($content['field_cn_008_4']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_009_1']!=NULL) { ?>
                    <li><?php print render($content['field_cn_009_1']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_009_2']!=NULL) { ?>
                    <li><?php print render($content['field_cn_009_2']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_009_3']!=NULL) { ?>
                    <li><?php print render($content['field_cn_009_3']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_009_4']!=NULL) { ?>
                    <li><?php print render($content['field_cn_009_4']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_009_5']!=NULL) { ?>
                    <li><?php print render($content['field_cn_009_5']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_011_1']!=NULL) { ?>
                    <li><?php print render($content['field_cn_011_1']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_011_2']!=NULL) { ?>
                    <li><?php print render($content['field_cn_011_2']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_011_3']!=NULL) { ?>
                    <li><?php print render($content['field_cn_011_3']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_011_4']!=NULL) { ?>
                    <li><?php print render($content['field_cn_011_4']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_011_5']!=NULL) { ?>
                    <li><?php print render($content['field_cn_011_5']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_011_6']!=NULL) { ?>
                    <li><?php print render($content['field_cn_011_6']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_012_1']!=NULL) { ?>
                    <li><?php print render($content['field_cn_012_1']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_012_2']!=NULL) { ?>
                    <li><?php print render($content['field_cn_012_2']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_012_3']!=NULL) { ?>
                    <li><?php print render($content['field_cn_012_3']); ?></li>
          <?php } ?>
          <?php if($content['field_cn_012_4']!=NULL) { ?>
                    <li><?php print render($content['field_cn_012_4']); ?></li>
          <?php } ?>
        </ul>
        <?php jcarousel_add('horizontalcarousel'); ?>
    <?php } ?>


<!-- STATION AND GAIT -->
    <?php if($content['field_video_station_and_gait']!=NULL) {
      print render($content['field_video_station_and_gait']);
     } ?>

    <?php if($content['field_video_station_and_gait']!=NULL) { ?>
        <ul class="horizontalcarousel jcarousel-skin-default">
          <?php if($content['field_sg_sta_1']!=NULL) { ?>
                    <li><?php print render($content['field_sg_sta_1']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_sta_2']!=NULL) { ?>
                    <li><?php print render($content['field_sg_sta_2']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_sta_3']!=NULL) { ?>
                    <li><?php print render($content['field_sg_sta_3']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_sta_4']!=NULL) { ?>
                    <li><?php print render($content['field_sg_sta_4']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_sta_5']!=NULL) { ?>
                    <li><?php print render($content['field_sg_sta_5']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_sta_6']!=NULL) { ?>
                    <li><?php print render($content['field_sg_sta_6']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_1']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_1']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_2']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_2']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_3']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_3']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_4']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_4']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_5']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_5']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_6']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_6']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_7']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_7']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_8']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_8']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_9']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_9']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_10']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_10']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_11']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_11']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_12']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_12']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_13']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_13']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_14']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_14']); ?></li>
          <?php } ?>
          <?php if($content['field_sg_gat_15']!=NULL) { ?>
                    <li><?php print render($content['field_sg_gat_15']); ?></li>
          <?php } ?>
        </ul>
        <?php jcarousel_add('horizontalcarousel'); ?>
    <?php } ?>
  </div>
</div>
