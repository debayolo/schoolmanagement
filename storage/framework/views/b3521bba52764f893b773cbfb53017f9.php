<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('common.news'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/Modules/News/public/assets/css/style.css" />

    <style>
        .single__details .details_content .d-flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .course__details {
            padding: 10px 15px;
            background: var(--bg_white);
            border-radius: 10px;
            box-shadow: none;
        }
        .f_s_20 {
            font-size: 16px;
        }
        .course_review_wrapper .course_cutomer_reviews .single_reviews {
            flex-direction: column;
        }
        .single_reviews .thumb {
            height: 67px!important;;
            width: 67px!important;
            flex: 67px 0 0!important;
            aspect-ratio: 1/1;
            margin-bottom: 0 !important;
            margin-right: 10px;
            line-heigth: 67px!important;
            }

        .single_reviews .thumb img{
            aspect-ratio: 1/1;
            height: 67px;
            width: 67px;
            object-fit: cover;
            object-position: center;
        }
        

        .course__details_title  .single__details{
            margin-bottom: 0!important;
        }
        .vote-section button{
            height: 32px;
            line-height: 1;
        }
        .vote-section button.btn-success{
            background: #38C172;
        }
        .vote-section button.btn-danger{
            background: #FF2020;
        }
        .vote-section i, .vote-section span {
            font-size: 12px;
        }

        .course_review_wrapper .course_cutomer_reviews .single_reviews .thumb {
            margin-right: 10px;
        }
        .review_content h4, .single_reviews h4 {
            font-size: 24px;
            text-transform: capitalize;
            color: #1F2B40;
            font-weight: 600;
        }

        .review_content span, .single_reviews span {
            font-size: 14px;
            font-weight: 600;
            color: #637083;
        }

        .course_review_wrapper .course_cutomer_reviews .single_reviews .review_content .rated_customer {
            margin-top: 0px
        }

        .course_review_wrapper .course_cutomer_reviews .single_reviews .thumb{
            line-height: 64px!important;
        }

        .single_reviews .small.fix-gr-bg{
            padding: 3px;
            aspect-ratio: 1/1;
            height: 32px;
            width: 32px;
            border-radius: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .single_reviews .small.fix-gr-bg.type1{
            background: #7C32FF;
        }
        .single_reviews .small.fix-gr-bg.type2{
            background: #FF2020;
        }

        .single_reviews .small.fix-gr-bg i{
            margin: 0;
        }

                
        .reply_btn_el {
            background: linear-gradient(77.16deg, #660AFB 13.44%, #BF37FF 87.24%);
            border: 0;
            padding: 2px 10px !important;
            color: white;
            display: inline-block !important;
            width: auto !important;
            border-radius: 2px !important;
            font-size: 12px;
            font-weight: 700;
            text-transform: capitalize;
        }
        #reply-upvote-count, #reply-downvote-count, #comment-upvote-count, #comment-downvote-count {
            font-size: 12px;
            color: inherit;
            font-weight: inherit;
            vertical-align: middle;
        }

        .img-fluid.rounded-circle {
            display: block;
        }
        .comment_replay_wized {
            margin-left: 50px;
            border: 1px solid #E9E7F7;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 2px;
        }
        .single_reviews {
            border: 1px solid #E9E7F7;
            padding: 20px;
            margin-bottom: ;
            border-bottom: 1px solid #E9E7F7 !important;
            padding-bottom: 20px!important;
            border-radius: 2px;
        }
        .comment_replay_wized .single_reviews {
            border: none !important;
            margin-bottom: 0!important;
            border-radius: 2px;
            padding: 0!important;
        }

        .course_review_wrapper .course_cutomer_reviews .single_reviews {
        margin-bottom: 30px;
        }
        .course_review_wrapper .course_cutomer_reviews{
            padding-top: 20px;
            margin-top: 0;
        }

        .course_review_wrapper .course_cutomer_reviews .details_title {
            margin-bottom: 20px;
        }

        .full-width-cover-image{
            width: 100%;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1> <?php echo app('translator')->get('common.news_details'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('common.news'); ?></a>
                    <a href="#"><?php echo app('translator')->get('common.news_details'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">              
                    <div class="white-box">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-md-10 col-sm-12 course__details mb-3">
                                <div class="text-center">
                                    <img class="img-fluid full-width-cover-image" src="<?php echo e(asset($news->image)); ?>" alt="">
                                </div>
                                <div class="course__details_title my-3">
                                    <div class="single__details">
                                        <div class="details_content">
                                            <span><?php echo app('translator')->get('common.category'); ?></span>
                                            <h4 class="mb-0"><?php echo e(@$news->newsCategory->title); ?></h4>
                                        </div>
                                    </div>
                                    <div class="single__details">
                                        <div class="details_content">
                                            <span><?php echo app('translator')->get('common.title'); ?></span>
                                            <h4 class="mb-0"><?php echo e(@$news->title); ?></h4>
                                        </div>
                                    </div>
                                    <div class="single__details">
                                        <div class="details_content">
                                            <span><?php echo app('translator')->get('common.tags'); ?></span>
                                            <div class="d-flex flex-wrap gap-10">
                                            <?php $__currentLoopData = $news->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <button class="btn btn-sm btn-primary gap-10 d-flex align-items-center gap-10"><i class="fa fa-tags"></i> <?php echo e($tag->title); ?></button>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-news-description justify-between">
                                    <p> <?php echo $news->description; ?></p>
                                </div>
                            </div>                           
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="course_review_wrapper">
                                    <div class="course_cutomer_reviews">
                                        <div class="details_title">
                                            <h4 class="font_22 f_w_700"><?php echo app('translator')->get('common.comments'); ?></h4>
                                        </div>
                                        <div class="customers_reviews">
                                            <?php $__currentLoopData = $news->newsComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="single_reviews">
                                                    <div class="d-flex align-items-center gap-10">
                                                        <div class="thumb">
                                                            
                                                                <img class="img-fluid rounded-circle"
                                                                    src="<?php echo e(@profile() && file_exists(@profile()) ? asset(profile()) : asset('public/backEnd/assets/img/avatar.png')); ?>"
                                                                    alt="<?php echo e(@$comment->user->staff->first_name); ?>">
                                                            
                                                        </div>

                                                        <div>
                                                            <h4 class="mb-0"><?php echo e(@$comment->user->full_name); ?>

                                                            </h4>
                                                            <div class="rated_customer d-flex align-items-center">
                                                                <span><?php echo e(dateconvert($comment->created_at)); ?></span>
                                                                <p class="badge bg-secondary text-white ml-2"> <?php echo e($comment->user->school->school_name); ?></p>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <?php
                                                                $createdBy = $comment->user_id;
                                                                $authUserId = auth()->user()->id;
                                                            ?>

                                                            <?php if($createdBy == $authUserId): ?>
                                                                <div class="d-flex align-items-center gap-10">
                                                                    <a class="dropdown-item small fix-gr-bg type1 p-1" data-toggle="modal" data-target="#editCommentModal<?php echo e($comment->id); ?>" href="#">
                                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M11.0514 3.00002L4.20976 10.2417C3.95142 10.5167 3.70142 11.0584 3.65142 11.4334L3.34309 14.1334C3.23476 15.1084 3.93476 15.775 4.90142 15.6084L7.58476 15.15C7.95976 15.0834 8.48475 14.8084 8.74309 14.525L15.5848 7.28335C16.7681 6.03335 17.3014 4.60835 15.4598 2.86668C13.6264 1.14168 12.2348 1.75002 11.0514 3.00002Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            <path d="M9.91016 4.2085C10.2685 6.5085 12.1352 8.26683 14.4518 8.50016" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            <path d="M2.5 18.3335H17.5" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        </svg>

                                                                    </a>
                                                                    <a class="dropdown-item small fix-gr-bg type2 p-1" data-toggle="modal" data-target="#deleteCommentModal<?php echo e($comment->id); ?>" href="#">
                                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M17.5 4.98356C14.725 4.70856 11.9333 4.56689 9.15 4.56689C7.5 4.56689 5.85 4.65023 4.2 4.81689L2.5 4.98356" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            <path d="M7.08203 4.1415L7.26536 3.04984C7.3987 2.25817 7.4987 1.6665 8.90703 1.6665H11.0904C12.4987 1.6665 12.607 2.2915 12.732 3.05817L12.9154 4.1415" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            <path d="M15.7096 7.6167L15.168 16.0084C15.0763 17.3167 15.0013 18.3334 12.6763 18.3334H7.3263C5.0013 18.3334 4.9263 17.3167 4.83464 16.0084L4.29297 7.6167" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            <path d="M8.60938 13.75H11.3844" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            <path d="M7.91797 10.4165H12.0846" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        </svg>

                                                                    </a>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="review_content">
                                                        <div>
                                                            <div>
                                                                <p class="py-4"><?php echo e($comment->comment); ?></p>
                                                                <div class="replay_btn">
                                                                    <button class="reply_btn_el small fix-gr-bg" data-toggle="collapse" data-target="#mainComment<?php echo e($comment->id); ?>" aria-expanded="false" aria-controls="collapseExample">reply </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="editCommentModal<?php echo e($comment->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editModalCommentLabel<?php echo e($comment->id); ?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalCommentLabel<?php echo e($comment->id); ?>">
                                                                    <?php echo app('translator')->get('common.edit_comment'); ?>
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'user-news-comment.update', 'method' => 'POST'])); ?>

                                                                <div class="row mb-3 mt-3">
                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="primary_input">
                                                                                    <input type="hidden" name="news_id" value="<?php echo e($news->id); ?>">
                                                                                    <input type="hidden" name="comment_id" value="<?php echo e($comment->id); ?>">
                                                                                    <label for="description<?php echo e($comment->id); ?>"><?php echo app('translator')->get('common.comment'); ?> <span class="text-danger">*</span></label>
                                                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" rows="5" name="comment" autocomplete="off" id="description<?php echo e($comment->id); ?>"><?php echo $comment->comment; ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                        
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('common.close'); ?></button>
                                                                <button type="submit" class="primary-btn fix-gr-bg submit">
                                                                    <span class="ti-check"></span>
                                                                    <?php echo app('translator')->get('common.save'); ?>
                                                                </button>
                                                            </div>
                                                            <?php echo e(Form::close()); ?>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade admin-query" id="deleteCommentModal<?php echo e(@$comment->id); ?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo app('translator')->get('common.delete_comment'); ?></h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
    
                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                                </div>
    
                                                                <div class="mt-40 d-flex justify-content-between">
                                                                    <button type="button" class="primary-btn tr-bg"
                                                                        data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                                    <a class="primary-btn fix-gr-bg" href="<?php echo e(route('user-news-comment.delete', [$comment->id])); ?>"
                                                                        class="text-light"> <?php echo app('translator')->get('common.delete'); ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="comment_replay_wized">
                                                    <div class="col-lg-12 collapse" id="mainComment<?php echo e($comment->id); ?>">
                                                        <form action="<?php echo e(route('user-news-comment-reply.store')); ?>" method="post" class="">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="news_id" value="<?php echo e(@$news->id); ?>">
                                                            <input type="hidden" name="comment_id" value="<?php echo e(@$comment->id); ?>">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="section_title3 mb_20">
                                                                        <h3><?php echo e(__('common.write_your_reply')); ?></h3>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-12">
                                                                    <div class="single_input mb_20">
                                                                        <textarea placeholder=" <?php echo e(__('common.write_your_answer')); ?>" name="reply" class="primary_textarea gray_input form-control"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-12 mb_30 ">
                                                                    <button type="submit" class="w-100 text-center mb_10 cart_store primary-btn fix-gr-bg height_50"> <?php echo e(__('common.submit')); ?></button>
                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                    <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="single_reviews">
                                                            <div class="d-flex align-items-center gap-10">
                                                                <div class="thumb">
                                                                    
                                                                        <img class="img-fluid rounded-circle" src=" <?php echo e(@profile() && file_exists(@profile()) ? asset(profile()) : asset('public/backEnd/assets/img/avatar.png')); ?>">
                                                                    
                                                                </div>
                                                                <div class="d-flex">
                                                                    <div>
                                                                        <h4 class="mb-0">
                                                                            <?php echo e(@$reply->user->full_name); ?></h4>
                                                                        <div class="rated_customer d-flex align-items-center">
                                                                            <span><?php echo e(dateconvert($reply->created_at)); ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <?php
                                                                            $createdBy = $reply->user_id;
                                                                            $authUserId = auth()->user()->id;
                                                                        ?>
        
                                                                        <?php if($createdBy == $authUserId): ?>
                                                                            <div class="d-flex align-items-center gap-10">
                                                                                <a class="dropdown-item small fix-gr-bg type1 p-1" data-toggle="modal" data-target="#editReplyModal<?php echo e($reply->id); ?>" href="#">
                                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path d="M11.0514 3.00002L4.20976 10.2417C3.95142 10.5167 3.70142 11.0584 3.65142 11.4334L3.34309 14.1334C3.23476 15.1084 3.93476 15.775 4.90142 15.6084L7.58476 15.15C7.95976 15.0834 8.48475 14.8084 8.74309 14.525L15.5848 7.28335C16.7681 6.03335 17.3014 4.60835 15.4598 2.86668C13.6264 1.14168 12.2348 1.75002 11.0514 3.00002Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                        <path d="M9.91016 4.2085C10.2685 6.5085 12.1352 8.26683 14.4518 8.50016" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                        <path d="M2.5 18.3335H17.5" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                    </svg>

                                                                                </a>
                                                                                <a class="dropdown-item small fix-gr-bg type2 p-1" data-toggle="modal" data-target="#deleteReplyModal<?php echo e($reply->id); ?>" href="#">
                                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path d="M17.5 4.98356C14.725 4.70856 11.9333 4.56689 9.15 4.56689C7.5 4.56689 5.85 4.65023 4.2 4.81689L2.5 4.98356" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                        <path d="M7.08203 4.1415L7.26536 3.04984C7.3987 2.25817 7.4987 1.6665 8.90703 1.6665H11.0904C12.4987 1.6665 12.607 2.2915 12.732 3.05817L12.9154 4.1415" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                        <path d="M15.7096 7.6167L15.168 16.0084C15.0763 17.3167 15.0013 18.3334 12.6763 18.3334H7.3263C5.0013 18.3334 4.9263 17.3167 4.83464 16.0084L4.29297 7.6167" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                        <path d="M8.60938 13.75H11.3844" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                        <path d="M7.91797 10.4165H12.0846" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                    </svg>

                                                                                </a>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
        
                                                            <div class="review_content">
                                                                <p class="py-4"><?php echo e($reply->reply); ?></p>
                                                            </div>
        
                                                            <div class="modal fade" id="editReplyModal<?php echo e($reply->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editModalReplyLabel<?php echo e($reply->id); ?>" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="editModalReplyLabel<?php echo e($reply->id); ?>">
                                                                                <?php echo app('translator')->get('common.edit_reply'); ?>
                                                                            </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'user-news-comment-reply.update', 'method' => 'POST'])); ?>

                                                                            <div class="row mb-3 mt-3">
                                                                                <div class="col-12">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-12">
                                                                                            <div class="primary_input">
                                                                                                <input type="hidden" name="news_id" value="<?php echo e($news->id); ?>">
                                                                                                <input type="hidden" name="comment_id" value="<?php echo e($comment->id); ?>">
                                                                                                <input type="hidden" name="reply_id" value="<?php echo e($reply->id); ?>">
                                                                                                <label for="reply<?php echo e($comment->id); ?>"><?php echo app('translator')->get('common.comment'); ?> <span class="text-danger">*</span></label>
                                                                                                <textarea class="primary_input_field form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" rows="5" name="reply" autocomplete="off" id="reply<?php echo e($reply->id); ?>"><?php echo $reply->reply; ?></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                    
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('common.close'); ?></button>
                                                                            <button type="submit" class="primary-btn fix-gr-bg submit">
                                                                                <span class="ti-check"></span>
                                                                                <?php echo app('translator')->get('common.save'); ?>
                                                                            </button>
                                                                        </div>
                                                                        <?php echo e(Form::close()); ?>

                                                                    </div>
                                                                </div>
                                                            </div>
        
                                                            <div class="modal fade admin-query" id="deleteReplyModal<?php echo e(@$reply->id); ?>">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title"><?php echo app('translator')->get('common.delete_reply'); ?></h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal">&times;</button>
                                                                        </div>
                
                                                                        <div class="modal-body">
                                                                            <div class="text-center">
                                                                                <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                                            </div>
                
                                                                            <div class="mt-40 d-flex justify-content-between">
                                                                                <button type="button" class="primary-btn tr-bg"
                                                                                    data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                                                <a class="primary-btn fix-gr-bg" href="<?php echo e(route('user-news-comment-reply.delete', [$reply->id])); ?>"
                                                                                    class="text-light"> <?php echo app('translator')->get('common.delete'); ?>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="conversition_box">

                                    <div id="conversition_box"></div>

                                    <div class="row">
                                        <div class="col-lg-12 " id="mainComment0">
                                            <form action="<?php echo e(route('user-news-comment.store')); ?>" method="post" class="">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="news_id" value="<?php echo e(@$news->id); ?>">

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="section_title3 mb_20">
                                                            <h3><?php echo e(__('common.leave_a_comment')); ?></h3>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="single_input mb_25">
                                                            <textarea rows="4" placeholder="<?php echo e(__('common.leave_a_comment')); ?>" name="comment" class="form-control mb-25"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 mb_30">
                                                        <button type="submit" class="w-100 text-center mb_10 cart_store primary-btn fix-gr-bg height_50">
                                                            <i class="fa fa-comments"></i> <?php echo e(__('common.comment')); ?>

                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\userNews\newsDetail.blade.php ENDPATH**/ ?>