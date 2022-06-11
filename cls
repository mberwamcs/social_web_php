[33mcommit 0ef14bb9f80b4696bc0a9a35e9f596dc6279a60c[m[33m ([m[1;36mHEAD -> [m[1;32mmain[m[33m, [m[1;31morigin/master[m[33m)[m
Author: mberwamcs <hmberwa1@gmail.com>
Date:   Fri Jun 10 15:05:21 2022 -0700

    adding all files

[1mdiff --git a/chosani/Working.with.image/cropped-image/resize.php b/chosani/Working.with.image/cropped-image/resize.php[m
[1mnew file mode 100644[m
[1mindex 0000000..ecd13c0[m
[1m--- /dev/null[m
[1m+++ b/chosani/Working.with.image/cropped-image/resize.php[m
[36m@@ -0,0 +1,213 @@[m
[32m+[m[32m<?php[m
[32m+[m[32mclass Image {[m
[32m+[m[32m    public function generate_filename($lenth){[m
[32m+[m[32m        $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');[m
[32m+[m[32m        $text = "";[m
[32m+[m
[32m+[m[32m        for($x = 0; $x < $lenth; $x++){[m
[32m+[m[32m            $random = rand(0,61);[m
[32m+[m[32m            $text .=$array[$random];[m
[32m+[m[32m        }[m
[32m+[m[32m        return $text;[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    public function crop_image($original_file_name, $cropped_file_name, $max_width, $max_height) {[m
[32m+[m[32m        //resizing image[m
[32m+[m[32m        if(file_exists($original_file_name)) {[m
[32m+[m[32m            $original_image = imagecreatefromjpeg($original_file_name);[m
[32m+[m
[32m+[m[32m            $original_width = imagesx($original_image);[m
[32m+[m[32m            $original_height = imagesy($original_image);[m
[32m+[m[41m           [m
[32m+[m[32m            if($original_height < $original_width){[m
[32m+[m[32m               // make with equal to max width[m
[32m+[m[32m                $ratio = $max_width / $original_width ;[m
[32m+[m[41m               [m
[32m+[m[32m                $new_width = $max_width;[m
[32m+[m[32m                $new_height = $original_height * $ratio;[m
[32m+[m[32m            }else{[m
[32m+[m[41m                [m
[32m+[m[32m                $ratio = $max_height / $original_height ;[m
[32m+[m
[32m+[m[32m                $new_height = $max_height;[m
[32m+[m[32m                $new_width = $original_width * $ratio;[m[41m [m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[32m        //adjust incase the maxwidth and height are different[m
[32m+[m[32m        if($max_width != $max_height){[m
[32m+[m
[32m+[m[32m            if($max_height > $max_width){[m
[32m+[m
[32m+[m[32m                if($max_height > $new_height){[m
[32m+[m[32m                    $adjustment = ($max_height / $new_height);[m
[32m+[m
[32m+[m[32m                }else {[m
[32m+[m[32m                    $adjustment = ($new_height / $max_height);[m
[32m+[m
[32m+[m[32m                }[m
[32m+[m[32m                $new_width = $new_width * $adjustment;[m
[32m+[m[32m                $new_height = $new_height * $adjustment;[m
[32m+[m
[32m+[m[32m            }else {[m
[32m+[m[32m                if($max_width > $new_width){[m
[32m+[m[32m                    $adjustment = ($max_width / $new_width);[m
[32m+[m
[32m+[m[32m                }else {[m
[32m+[m[32m                    $adjustment = ($new_width / $max_width);[m
[32m+[m
[32m+[m[32m                }[m
[32m+[m[32m                $new_width = $new_width * $adjustment;[m
[32m+[m[32m                $new_height = $new_height * $adjustment;[m
[32m+[m[32m            }[m
[32m+[m[41m            [m
[32m+[m[32m        }[m[41m [m
[32m+[m
[32m+[m
[32m+[m[32m        $new_image = imagecreatetruecolor($new_width, $new_height);[m
[32m+[m[32m        imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);[m
[32m+[m
[32m+[m[32m        imagedestroy($original_image);[m
[32m+[m
[32m+[m[32m        if($max_width != $max_height){[m
[32m+[m[32m            if($max_width > $max_height){[m
[32m+[m[32m                $diff = ($new_height - $max_height);[m
[32m+[m[32m                if($diff < 0){[m
[32m+[m[32m                    $diff = $diff * -1;[m
[32m+[m[32m                }[m
[32m+[m[32m                $y= round($diff / 2);[m
[32m+[m[32m                $x = 0;[m
[32m+[m[32m            }else {[m
[32m+[m[32m                $diff = ($new_width - $max_width);[m
[32m+[m[32m                if($diff < 0){[m
[32m+[m[32m                    $diff = $diff * -1;[m
[32m+[m[32m                }[m
[32m+[m[32m                $x = round($diff / 2);[m
[32m+[m[32m                $y = 0;[m
[32m+[m[32m            }[m
[32m+[m[32m        }else{[m
[32m+[m[32m            if($new_height > $new_width){[m
[32m+[m[32m                $diff = ($new_height - $new_width);[m
[32m+[m[32m                $y= round($diff / 2);[m
[32m+[m[32m                $x = 0;[m
[32m+[m[32m            }else {[m
[32m+[m[32m               $diff = ($new_width - $new_height);[m
[32m+[m[32m               $x = round($diff / 2);[m
[32m+[m[32m               $y = 0;[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[32m        $new_cropped_image = imagecreatetruecolor($max_width, $max_height);[m
[32m+[m[32m        imagecopyresampled($new_cropped_image, $new_image, 0, 0, $x, $y, $max_width, $max_height, $max_width, $max_height);[m
[32m+[m
[32m+[m[32m        imagedestroy($new_image);[m
[32m+[m
[32m+[m[32m        imagejpeg($new_cropped_image, $cropped_file_name, 90);[m
[32m+[m
[32m+[m[32m        imagedestroy($new_cropped_image);[m
[32m+[m[32m    }[m
[32m+[m[32m// resize image[m
[32m+[m[32m    public function resize_image($original_file_name, $resize_file_name, $max_width, $max_height) {[m
[32m+[m
[32m+[m[32m        if(file_exists($original_file_name)) {[m
[32m+[m[32m            $original_image = imagecreatefromjpeg($original_file_name);[m
[32m+[m
[32m+[m[32m            $original_width = imagesx($original_image);[m
[32m+[m[32m            $original_height = imagesy($original_image);[m
[32m+[m[41m           [m
[32m+[m[32m            if($original_height < $original_width){[m
[32m+[m[32m               // make with equal to max width[m
[32m+[m[32m                $ratio = $max_width / $original_width ;[m
[32m+[m[41m               [m
[32m+[m[32m                $new_width = $max_width;[m
[32m+[m[32m                $new_height = $original_height * $ratio;[m
[32m+[m[32m            }else{[m
[32m+[m[41m                [m
[32m+[m[32m                $ratio = $max_height / $original_height ;[m
[32m+[m
[32m+[m[32m                $new_height = $max_height;[m
[32m+[m[32m                $new_width = $original_width * $ratio;[m[41m [m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[32m        //adjust incase the maxwidth and height are different[m
[32m+[m[32m        if($max_width != $max_height){[m
[32m+[m
[32m+[m[32m            if($max_height > $max_width){[m
[32m+[m
[32m+[m[32m                if($max_height > $new_height){[m
[32m+[m[32m                    $adjustment = ($max_height / $new_height);[m
[32m+[m
[32m+[m[32m                }else {[m
[32m+[m[32m                    $adjustment = ($new_height / $max_height);[m
[32m+[m
[32m+[m[32m                }[m
[32m+[m[32m                $new_width = $new_width * $adjustment;[m
[32m+[m[32m                $new_height = $new_height * $adjustment;[m
[32m+[m
[32m+[m[32m            }else {[m
[32m+[m[32m                if($max_width > $new_width){[m
[32m+[m[32m                    $adjustment = ($max_width / $new_width);[m
[32m+[m
[32m+[m[32m                }else {[m
[32m+[m[32m                    $adjustment = ($new_width / $max_width);[m
[32m+[m
[32m+[m[32m                }[m
[32m+[m[32m                $new_width = $new_width * $adjustment;[m
[32m+[m[32m                $new_height = $new_height * $adjustment;[m
[32m+[m[32m            }[m
[32m+[m[41m            [m
[32m+[m[32m        }[m[41m [m
[32m+[m
[32m+[m
[32m+[m[32m        $new_image = imagecreatetruecolor($new_width, $new_height);[m
[32m+[m[32m        imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);[m
[32m+[m
[32m+[m[32m        imagedestroy($original_image);[m
[32m+[m
[32m+[m[32m        imagejpeg($new_image, $resize_file_name, 90);[m
[32m+[m[32m        imagedestroy($new_image);[m
[32m+[m[32m    }[m
[32m+[m[32m    //create thumbnail for cover image[m
[32m+[m[32m    public function get_thumb_cover($filename){[m
[32m+[m[32m        $thumbnail = $filename ." _cover_thumb.jpg";[m
[32m+[m[32m        if(file_exists($thumbnail)){[m
[32m+[m[32m            return $thumbnail;[m
[32m+[m[32m        }[m
[32m+[m[32m        $this->crop_image($filename,$thumbnail, 1366,488);[m
[32m+[m
[32m+[m[32m        if(file_exists($thumbnail)){[m
[32m+[m[32m            return $thumbnail;[m
[32m+[m[32m        }else {[m
[32m+[m[32m            return$filename;[m
[32m+[m[32m        }[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    //create thumbnail for profile image[m
[32m+[m[32m    public function get_thumb_profile($filename){[m
[32m+[m[32m        $thumbnail = $filename ." _profile_thumb.jpg";[m
[32m+[m[32m        if(file_exists($thumbnail)){[m
[32m+[m[32m            return $thumbnail;[m
[32m+[m[32m        }[m
[32m+[m[32m        $this->crop_image($filename,$thumbnail, 800,800);[m
[32m+[m
[32m+[m[32m        if(file_exists($thumbnail)){[m
[32m+[m[32m            return $thumbnail;[m
[32m+[m[32m        }else {[m
[32m+[m[32m            return$filename;[m
[32m+[m[32m        }[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m
[32m+[m[32m    //create thumbnail for post image[m
[32m+[m[32m    public function get_thumb_post($filename){[m
[32m+[m[32m        $thumbnail = $filename ." _post_thumb.jpg";[m
[32m+[m[32m        if(file_exists($thumbnail)){[m
[32m+[m[32m            return $thumbnail;[m
[32m+[m[32m        }[m
[32m+[m[32m        $this->crop_image($filename,$thumbnail, 800,800);[m
[32m+[m
[32m+[m[32m        if(file_exists($thumbnail)){[m
[32m+[m[32m            return $thumbnail;[m
[32m+[m[32m        }else {[m
[32m+[m[32m            return$filename;[m
[32m+[m[32m        }[m
[32m+[m[32m    }[m
[32m+[m[32m}[m
\ No newline at end of file[m
[1mdiff --git a/chosani/Working.with.image/index.php b/chosani/Working.with.image/index.php[m
[1mnew file mode 100644[m
[1mindex 0000000..e69de29[m
[1mdiff --git a/chosani/Working.with.image/original-image/20200322_155312.jpg b/chosani/Working.with.image/original-image/20200322_155312.jpg[m
[1mnew file mode 100644[m
[1mindex 0000000..3f6c89d[m
Binary files /dev/null and b/chosani/Working.with.image/original-image/20200322_155312.jpg differ
[1mdiff --git a/chosani/Working.with.image/original-image/20200322_155319.jpg b/chosani/Working.with.image/original-image/20200322_155319.jpg[m
[1mnew file mode 100644[m
[1mindex 0000000..b4afb18[m
Binary files /dev/null and b/chosani/Working.with.image/original-image/20200322_155319.jpg differ
[1mdiff --git a/chosani/Working.with.image/original-image/20200324_125247.jpg b/chosani/Working.with.image/original-image/20200324_125247.jpg[m
[1mnew file mode 100644[m
[1mindex 0000000..ec322a2[m
Binary files /dev/null and b/chosani/Working.with.image/original-image/20200324_125247.jpg differ
[1mdiff --git a/chosani/Working.with.image/original-image/index.php b/chosani/Working.with.image/original-image/index.php[m
[1mnew file mode 100644[m
[1mindex 0000000..e69de29[m
[1mdiff --git a/chosani/Working.with.image/original-image/original-image20200322_155312.jpg b/chosani/Working.with.image/original-image/original-image20200322_155312.jpg[m
[1mnew file mode 100644[m
[1mindex 0000000..d9d0ccc[m
Binary files /dev/null and b/chosani/Working.with.image/original-image/original-image20200322_155312.jpg differ
[1mdiff --git a/chosani/Working.with.image/original-image/original-image20200322_155315.jpg b/chosani/Working.with.image/original-image/original-image20200322_155315.jpg[m
[1mnew file mode 100644[m
[1mindex 0000000..840abd3[m
Binary files /dev/null and b/chosani/Working.with.image/original-image/original-image20200322_155315.jpg differ
[1mdiff --git a/chosani/Working.with.image/original-image/original-image20200322_155319.jpg b/chosani/Working.with.image/original-image/original-image20200322_155319.jpg[m
[1mnew file mode 100644[m
[1mindex 0000000..4022f70[m
Binary files /dev/null and b/chosani/Working.with.image/original-image/original-image20200322_155319.jpg differ
[1mdiff --git a/chosani/Working.with.image/original-image/original-image20200322_160331.png b/chosani/Working.with.image/original-image/original-image20200322_160331.png[m
[1mnew file mode 100644[m
[1mindex 0000000..59a7ec1[m
Binary files /dev/null and b/chosani/Working.with.image/original-image/original-image20200322_160331.png differ
[1mdiff --git a/chosani/Working.with.image/original-image/original-image20200324_125236.jpg b/chosani/Working.with.image/original-image/original-image20200324_125236.jpg[m
[1mnew file mode 100644[m
[1mindex 0000000..14d14fb[m
Binary files /dev/null and b/chosani/Working.with.image/original-image/original-image20200324_125236.jpg differ
[1mdiff --git a/chosani/Working.with.image/original-image/upload.image.php b/chosani/Working.with.image/original-image/upload.image.php[m
[1mnew file mode 100644[m
[1mindex 0000000..1ba390f[m
[1m--- /dev/null[m
[1m+++ b/chosani/Working.with.image/original-image/upload.image.php[m
[36m@@ -0,0 +1,78 @@[m
[32m+[m[32m<?php[m
[32m+[m
[32m+[m[32mfunction resize_image($image, $max_image) {[m
[32m+[m
[32m+[m[32m    if(file_exists($image)) {[m
[32m+[m[32m        $original_image = imagecreatefromjpeg($image);[m
[32m+[m
[32m+[m[32m        //what is the resolution[m
[32m+[m[32m        $original_width = imagesx($original_image);[m
[32m+[m[32m        $original_height = imagesy($original_image);[m
[32m+[m
[32m+[m[32m       //try width first[m[41m [m
[32m+[m[32m        $ratio = $max_image/ $original_width ;[m[41m   [m
[32m+[m[32m        $new_width = $max_image;[m
[32m+[m[32m        $new_height = $original_height * $ratio;[m
[32m+[m
[32m+[m[32m        //if it didnot work[m
[32m+[m[32m        if($new_height > $max_image){[m
[32m+[m[32m            $ratio = $max_image/ $original_height ;[m[41m   [m
[32m+[m[32m            $new_height = $max_image;[m
[32m+[m[32m            $new_width = $original_width * $ratio;[m
[32m+[m[32m        }[m
[32m+[m
[32m+[m[32m        if($original_image){[m
[32m+[m[32m            $new_image = imagecreatetruecolor($new_width, $new_height);[m
[32m+[m[32m            imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);[m
[32m+[m[41m        [m
[32m+[m[32m            imagejpeg($new_image, $image, 90);[m
[32m+[m
[32m+[m[41m            [m
[32m+[m[32m        }[m
[32m+[m[32m    }[m
[32m+[m[32m}[m
[32m+[m[32m    if($_SERVER['REQUEST_METHOD'] == "POST") {[m
[32m+[m[32m        if(isset($_FILES['image']['name'])) {[m
[32m+[m[41m        [m
[32m+[m[32m            foreach($_FILES['image'] as $key => $value){[m
[32m+[m[32m            move_uploaded_file($_FILES['image']['tmp_name'], $_FILES['image']['name']);[m
[32m+[m
[32m+[m[32m             $image = $_FILES['image']['name'];[m
[32m+[m
[32m+[m[32m             resize_image($image, 200);[m
[32m+[m
[32m+[m[32m            echo "<img src='$image'>";[m
[32m+[m[32m            //var_dump($image);[m
[32m+[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[32m    }[m[41m   [m
[32m+[m[32m?>[m
[32m+[m
[32m+[m[32m<!DOCTYPE html>[m
[32m+[m[32m<html lang="en">[m
[32m+[m[32m<head>[m
[32m+[m[32m    <meta charset="UTF-8">[m
[32m+[m[32m    <meta http-equiv="X-UA-Compatible" content="IE=edge">[m
[32m+[m[32m    <meta name="viewport" content="width=device-width, initial-scale=1.0">[m
[32m+[m[32m    <title>Document</title>[m
[32m+[m[32m</head>[m
[32m+[m[32m<body>[m
[32m+[m[32m    Location: http://localhost/social_website/chosani/Working.with.image/original-image/upload.image.php <hr>[m
[32m+[m[32m    <h1>Original image</h1> <br>[m
[32m+[m[32m    <h3>Upload image</h3>[m
[32m+[m
[32m+[m[32m    <form action="" method="post" enctype="multipart/form-data">[m
[32m+[m[32m        <input type="file" name="image">[m
[32m+[m[32m        <input type="submit" value="upload" name="upload">[m
[32m+[m
[32m+[m[32m    </form>[m
[32m+[m[32m    <div>[m
[32m+[m[32m        <?php[m
[32m+[m
[32m+[m[32m        ?>[m
[32m+[m[32m    </div>[m
[32m+[m
[32m+[m[41m   [m
[32m+[m[32m</body>[m
[32m+[m[32m</html>[m
\ No newline at end of file[m
[1mdiff --git a/chosani/Working.with.image/original-image/upload.image.php20200322_155315.jpg b/chosani/Working.with.image/original-image/upload.image.php20200322_155315.jpg[m
[1mnew file mode 100644[m
[1mindex 0000000..840abd3[m
Binary files /dev/null and b/chosani/Working.with.image/original-image/upload.image.php20200322_155315.jpg differ
[1mdiff --git a/chosani/Working.with.image/original-image/upload.image.php20200322_160331.png b/chosani/Working.with.image/original-image/upload.image.php20200322_160331.png[m
[1mnew file mode 100644[m
[1mindex 0000000..59a7ec1[m
Binary files /dev/null and b/chosani/Working.with.image/original-image/upload.image.php20200322_160331.png differ
[1mdiff --git a/chosani/allme.css b/chosani/allme.css[m
[1mnew file mode 100644[m
[1mindex 0000000..ad0d1c2[m
[1m--- /dev/null[m
[1m+++ b/chosani/allme.css[m
[36m@@ -0,0 +1,94 @@[m
[32m+[m
[32m+[m[32m        body {[m
[32m+[m[32m        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;[m
[32m+[m[32m        background-color: rgb(207, 193, 193);[m
[32m+[m[32m        margin: 0;[m
[32m+[m[32m        }[m[41m [m
[32m+[m[32m    /************************ end of body styling*/[m[41m [m
[32m+[m[32m        #page-cover {[m
[32m+[m[32m            background-color: lightgray;[m
[32m+[m[32m            min-height:200px;[m
[32m+[m[32m            margin:auto;[m
[32m+[m[32m            width:60%;[m
[32m+[m[32m        }[m
[32m+[m[32m        #main-cover {[m
[32m+[m[32m            text-align: center;[m
[32m+[m[32m            margin-bottom:0px;[m
[32m+[m[32m            width:100%;[m
[32m+[m[32m        }[m
[32m+[m[32m        #pro-pic {[m
[32m+[m[32m            margin-top: -106px;[m[41m  [m
[32m+[m[32m        }[m
[32m+[m[32m        #pro-pic img {[m
[32m+[m[32m            margin: 0px auto; border-radius:90px;border: solid 1px white;[m
[32m+[m[32m        }[m
[32m+[m
[32m+[m[32m        #link {[m
[32m+[m[32m            width: auto;display: inline-block; text-align: center;[m
[32m+[m[41m            [m
[32m+[m[32m        }[m
[32m+[m[32m        .link {[m
[32m+[m[32m            display: inline-block;[m[41m [m
[32m+[m[32m            margin: 5px;[m
[32m+[m[32m            text-align: center;[m
[32m+[m[32m            color: blue;[m
[32m+[m[32m            font-size: 1.2em;[m
[32m+[m[32m            font-weight: bolder;[m
[32m+[m[32m        }[m
[32m+[m[32m        #friends_img {[m
[32m+[m[32m            width: 75px;[m
[32m+[m[32m            float: left;[m
[32m+[m[32m            margin: 10px;[m
[32m+[m[32m        }[m
[32m+[m[32m        #friends_bar{[m
[32m+[m[32m            background-color: white;[m
[32m+[m[32m            min-height: 400px;[m
[32m+[m[32m            margin-top: 10px;[m
[32m+[m[32m            color: #405d9b;[m
[32m+[m[32m            padding: 8px;[m
[32m+[m[32m        }[m
[32m+[m[32m    .name {[m
[32m+[m[32m        color: #405d9b;[m[41m [m
[32m+[m[32m        font-size: 1.2em;[m
[32m+[m[32m        font-weight: bolder;[m
[32m+[m[32m    }[m
[32m+[m[32m    #friends {[m
[32m+[m[32m        clear: both;[m
[32m+[m[41m        [m
[32m+[m[32m    }[m
[32m+[m[32m    textarea {[m
[32m+[m[32m        width: 100%;[m
[32m+[m[32m        border: none;[m
[32m+[m[32m        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;[m
[32m+[m[32m        font-size: 14px;[m
[32m+[m[32m    }[m
[32m+[m[32m    #post_button{[m
[32m+[m[32m         float: right; background-color: blue;border: none;color: white;padding: 2px;font-size: 14px;border-radius: 3px;[m
[32m+[m[32m        min-width: 50px; width: 50px; cursor: pointer;[m
[32m+[m[41m       [m
[32m+[m[41m        [m
[32m+[m[32m    }[m
[32m+[m[32m    #image_post{[m
[32m+[m[32m        background-color: #607076; color: white; border-radius: 3px;[m
[32m+[m[32m        width: 35%; float: left; margin: 5px auto;[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    #post_bar {[m
[32m+[m[32m        margin-top: 10px;[m
[32m+[m[32m        background-color: white;[m
[32m+[m[32m        padding: 10px;[m
[32m+[m[41m        [m
[32m+[m[32m    }[m
[32m+[m[32m    #post {[m
[32m+[m[32m        padding: 4px;[m
[32m+[m[32m        font-size: 13px;[m
[32m+[m[32m        display: flex;[m
[32m+[m[32m        margin-bottom:10px;[m
[32m+[m[32m        border-radius: none;[m
[32m+[m[41m        [m
[32m+[m[32m    }[m
[32m+[m[32m     #postText :active{[m
[32m+[m[32m        border: none;[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m/* *************************** END OF PROFILE PAGE STYLES ***************************** */[m
[1mdiff --git a/chosani/autoload.php b/chosani/autoload.php[m
[1mnew file mode 100644[m
[1mindex 0000000..fef0287[m
[1m--- /dev/null[m
[1m+++ b/chosani/autoload.php[m
[36m@@ -0,0 +1,14 @@[m
[32m+[m[32m<?php[m
[32m+[m[32msession_start();[m
[32m+[m[41m [m
[32m+[m[32m    //unset($_SESSION['user_userid']);[m
[32m+[m[32m    include("miyatoo/connectsocial.php");[m
[32m+[m[32m    include("miyatoo/signin.php");[m
[32m+[m[32m    include("miyatoo/signup.php");[m
[32m+[m[32m    include("miyatoo/user.php");[m
[32m+[m[32m    include("miyatoo/posts.php");[m
[32m+[m[32m    include("miyatoo/image.php");[m
[32m+[m[32m    include("miyatoo/userprofile.php");[m
[32m+[m[32m    //include("like.php");[m
[32m+[m[41m    [m
[32m+[m
[1mdiff --git a/chosani/change_profile_image.php b/chosani/change_profile_image.php[m
[1mnew file mode 100644[m
[1mindex 0000000..5500c29[m
[1m--- /dev/null[m
[1m+++ b/chosani/change_profile_image.php[m
[36m@@ -0,0 +1,189 @@[m
[32m+[m[32m<?php[m
[32m+[m[32m    //session_start();[m
[32m+[m[32m    include('autoload.php');[m
[32m+[m[41m    [m
[32m+[m[32m    $login = new Login();[m
[32m+[m[32m    $user_data = $login->check_id($_SESSION['userid']);[m
[32m+[m[41m    [m
[32m+[m[32m    //posting starts here[m
[32m+[m[32m    if ($_SERVER['REQUEST_METHOD'] == "POST"){[m
[32m+[m[41m        [m
[32m+[m
[32m+[m[32m        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){[m
[32m+[m
[32m+[m[32m            //if is the wrong type of file[m
[32m+[m[32m            if($_FILES['file']['type'] == "image/jpeg"){[m
[32m+[m
[32m+[m[32m                // if size is large then allowed[m
[32m+[m[32m                $allowed_size = (1024 * 1024) * 10;[m
[32m+[m[32m                // see what i did[m
[32m+[m[32m                echo " Allowed size " .$allowed_size."<br>";[m
[32m+[m[32m                echo " Uploaded size " .$_FILES['file']['size']."<br>";[m
[32m+[m[41m            [m
[32m+[m[32m                 //everything is fine[m
[32m+[m[32m                    $folder = "uploads/".$user_data['userid'] ."/";[m
[32m+[m
[32m+[m[32m                    //create folder[m
[32m+[m