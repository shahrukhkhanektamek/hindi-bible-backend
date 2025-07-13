<?php
 echo cloudinary()->getVideoTag($publicId ?? '')->setAttributes(['controls', 'loop', 'preload'])->fallback('Your browser does not support HTML5 video tagsssss.')->scale($width ?? '', $height ?? '');
?><?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\vendor\cloudinary-labs\cloudinary-laravel\resources\views\components\video.blade.php ENDPATH**/ ?>