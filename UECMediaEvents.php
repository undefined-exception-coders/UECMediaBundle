<?php

namespace UEC\MediaBundle;

class UECMediaEvents
{
    /**
     * @see \UEC\MediaBundle\Event\MediaFileInfoEvent
     */
    const AFTER_PROCESS_FILE = 'uec_media.event.after_process_file';

    /**
     * @see \UEC\MediaBundle\Event\MediaFileInfoPathEvent
     */
    const AFTER_GENERATE_FILE_PATH = 'uec_media.event.after_generate_file_path';

    /**
     * @see \UEC\MediaBundle\Event\MediaFileInfoPathEvent
     */
    const AFTER_GENERATE_FILE_NAME = 'uec_media.event.after_generate_file_name';

    /**
     * @see \UEC\MediaBundle\Event\MediaFileInfoPathUploadEvent
     */
    const AFTER_UPLOAD_FILE = 'uec_media.event.after_upload_file';

    /**
     * @see \UEC\MediaBundle\Event\MediaUploadEvent
     */
    const AFTER_FILL_MEDIA_PROVIDER = 'uec_media.event.after_fill_media_provider';

    /**
     * @see \UEC\MediaBundle\Event\MediaEvent
     */
    const AFTER_PERSIST_MEDIA_PROVIDER = 'uec_media.event.after_persist_media_provider';
}