<?php $__env->startSection('title'); ?>
    Show
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="admin-visitor-area up_st_admin_visitor" id="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="chat_main_wrapper">
                        <div class="chat_flow_list_wrapper ">
                            <div class="box_header">
                                <div class="main-title">
                                    <h3 class="m-0">Chat List</h3>
                                </div>
                                <a class="primary-btn radius_30px  fix-gr-bg" href="<?php echo e(url('admin/communication_new_chat')); ?>"><i class="ti-plus"></i>New Chat</a>
                            </div>
                            <!-- chat_list  -->
                            <side-panel-component
                                    :settings="<?php echo e(json_encode(generalSetting()->only(['teacher_phone_view', 'teacher_email_view']))); ?>"
                                :search_url="<?php echo e(json_encode(route('chat.user.search'))); ?>"
                                :single_chat_url="<?php echo e(json_encode(route('chat.index'))); ?>"
                                :chat_block_url="<?php echo e(json_encode(route('chat.user.block'))); ?>"
                                :create_group_url="<?php echo e(json_encode(route('chat.group.create'))); ?>"
                                :group_chat_show="<?php echo e(json_encode(route('chat.group.show'))); ?>"
                                :users="<?php echo e(json_encode($users)); ?>"
                                :groups="<?php echo e(json_encode($groups)); ?>"
                                :can_create_group="<?php echo e(json_encode(createGroupPermission())); ?>"
                                :asset_type="<?php echo e(json_encode('/public')); ?>"
                            ></side-panel-component>
                            <!--/ chat_list  -->
                        </div>



                        <?php if(env('BROADCAST_DRIVER') == null || env('BROADCAST_DRIVER') == 'log'): ?>
                            <jquery-chat-component
                                :new_message_check_url="<?php echo e(json_encode(route('chat.message.check'))); ?>"
                                :to_user="<?php echo e(json_encode($activeUser->load('activeStatus'))); ?>"
                                :from_user="<?php echo e(json_encode(auth()->user()->load('activeStatus'))); ?>"
                                :send_message_url="<?php echo e(json_encode(route('chat.send'))); ?>"
                                :app_url="<?php echo e(json_encode(env('APP_URL'). '/')); ?>"
                                :files_url="<?php echo e(json_encode(route('chat.files', ['type' => 'single', 'id' => $activeUser->id]))); ?>"
                                :loaded_conversations="<?php echo e(json_encode(collect($messages))); ?>"
                                :connected_users="<?php echo e(json_encode(collect($users))); ?>"
                                :forward_message_url="<?php echo e(json_encode(route('chat.send.forward'))); ?>"
                                :delete_message_url="<?php echo e(json_encode(route('chat.delete'))); ?>"
                                :can_upload_file="<?php echo e(json_encode(app('general_settings')->get('chat_can_upload_file')== 'yes')); ?>"
                                :asset_type="<?php echo e(json_encode('/public')); ?>"
                            ></jquery-chat-component>
                        <?php else: ?>
                            <chat-component
                                :to_user="<?php echo e(json_encode($activeUser->load('activeStatus'))); ?>"
                                :from_user="<?php echo e(json_encode(auth()->user()->load('activeStatus'))); ?>"
                                :send_message_url="<?php echo e(json_encode(route('chat.send'))); ?>"
                                :app_url="<?php echo e(json_encode(env('APP_URL'). '/')); ?>"
                                :files_url="<?php echo e(json_encode(route('chat.files', ['type' => 'single', 'id' => $activeUser->id]))); ?>"
                                :loaded_conversations="<?php echo e(json_encode(collect($messages))); ?>"
                                :connected_users="<?php echo e(json_encode(collect($users))); ?>"
                                :forward_message_url="<?php echo e(json_encode(route('chat.send.forward'))); ?>"
                                :delete_message_url="<?php echo e(json_encode(route('chat.delete'))); ?>"
                                :can_upload_file="<?php echo e(json_encode(app('general_settings')->get('chat_can_upload_file')== 'yes')); ?>"
                                :asset_type="<?php echo e(json_encode('/public')); ?>"
                            ></chat-component>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\Modules\Chat\Resources\views\show.blade.php ENDPATH**/ ?>