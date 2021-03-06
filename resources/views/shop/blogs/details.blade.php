@extends('layouts.shop')
@section('content')
    <div id="wrapper-site">

        <nav data-depth="1" class="breadcrumb-bg">
            <div class="container no-index">
                <div class="breadcrumb">

                    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="http://demo.bestprestashoptheme.com/savemart/">
                                <span itemprop="name">Home</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item"
                                href="http://demo.bestprestashoptheme.com/savemart/en/blog/category/3_news.html">
                                <span itemprop="name">News</span>
                            </a>
                            <meta itemprop="position" content="2">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <span itemprop="name">Lorem ipsum dolor sit amet</span>
                            <meta itemprop="position" content="3">
                        </li>
                    </ol>

                </div>
            </div>
        </nav>



        <div class="container no-index">
            <div class="row">
                <div id="content-wrapper" class="right-column col-xs-12 col-sm-8 col-md-9 flex-xs-first">

                    <div class="blogwapper has-sidebar-right">
                        <div id="content" class="block">
                            <div itemtype="#" itemscope="" id="sdsblogArticle" class="blog-post">

                                <div class="post-img">

                                    <a id="post_images"
                                        href="/savemart/modules//smartblog/images/14-single-default.jpg"><img
                                            class="img-fluid"
                                            src="/savemart/modules//smartblog/images/14-single-default.jpg"
                                            alt="Lorem ipsum dolor sit amet"></a>
                                </div>
                                <h1 class="post-title">Lorem ipsum dolor sit amet</h1>
                                <div class="articleContent" itemprop="articleBody">
                                    <div class="sdsarticle-des">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam <br>Lorem
                                            ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut iaculis arcu.
                                            Proin tincidunt, ipsum nec vehicula euismod, neque nibh pretium lorem, at ornare
                                            risus sem et risus. Curabitur pulvinar dui viverra libero lobortis in dictum
                                            velit luctus. Donec imperdiet tincidunt interdum<br><br>Lorem ipsum dolor sit
                                            amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua. Ut enim adminim veniam libero lobortis in dictum velit
                                            luctus. Donec imperdiet tincidunt interdum.</p>
                                        <h4 style="color: #222;">HERE, WE BRING YOU A LOOK-SEE:</h4>
                                        <p></p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam <br>Lorem
                                            ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut iaculis arcu.
                                            Proin tincidunt, ipsum nec vehicula euismod, neque nibh pretium lorem, at ornare
                                            risus sem et risus. Curabitur pulvinar dui viverra libero lobortis in dictum
                                            velit luctus. Donec imperdiet tincidunt interdum<br>Lorem ipsum dolor sit amet,
                                            consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore
                                            magna aliqua.</p>
                                        <p></p>
                                        <table style="margin-left: -15px; margin-right: -15px;" cellpadding="15">
                                            <tbody>
                                                <tr>
                                                    <td><img src="http://images.vinovathemes.com/prestashop_digimart/blog-content/image-content-2.jpg"
                                                            width="420" height="300"></td>
                                                    <td><img src="http://images.vinovathemes.com/prestashop_digimart/blog-content/image-content-1.jpg"
                                                            alt="" width="420" height="300"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <pre></pre>
                                        <p></p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam <br>Lorem
                                            ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut iaculis arcu.
                                            Proin tincidunt, ipsum nec vehicula euismod, neque nibh pretium lorem, at ornare
                                            risus sem et risus. Curabitur pulvinar dui viverra libero lobortis in dictum
                                            velit luctus. Donec imperdiet tincidunt interdum<br>Lorem ipsum dolor sit amet,
                                            consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore
                                            magna aliqua. <br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                            do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim
                                            veniam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut
                                            iaculis arcu. Proin tincidunt, ipsum nec vehicula euismod neque</p>
                                    </div>
                                </div>
                                <div class="sdsarticleBottom">
                                    <div class="post-info">


                                        <span class="datetime">
                                            <i class="zmdi zmdi-calendar-note"></i>
                                            <span itemprop="dateCreated">Apr 12, 2018</span>
                                        </span>
                                        <span class="comment">
                                            <i class="fa fa-comment"></i>
                                            <span>0 Comments</span>
                                        </span>
                                        <span itemprop="author" class="author">
                                            <i class="fa fa-user"></i>
                                            <span>Admin</span>
                                        </span>

                                    </div>


                                </div>

                            </div>




                        </div>

                        <div class="smartblogcomments" id="respond">
                            <h4 class="comment-reply-title" id="reply-title">Submit comment</h4>
                            <div id="commentInput">
                                <form action="" method="post" id="commentform">
                                    <input type="hidden" name="comment_post_ID" value="1478" id="comment_post_ID">
                                    <input type="hidden" name="id_post" value="14" id="id_post">
                                    <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                    <div class="row">
                                        <div class="form-group col col-xs-12">
                                            <input type="text" class="inputName form-control" name="name"
                                                placeholder="Your Name *">
                                        </div>
                                        <div class="form-group col col-xs-12">
                                            <input type="text" class="inputMail form-control" name="mail"
                                                placeholder="Your E-mail *">
                                        </div>
                                        <div class="form-group col col-xs-12">
                                            <input type="text" class="form-control" name="website"
                                                placeholder="Your Website">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <textarea tabindex="4" class="inputContent form-control grey" rows="10"
                                                name="comment" placeholder="Your Message"></textarea>
                                        </div>
                                    </div>


                                    <div class="submit">
                                        <input type="submit" name="addComment" id="submitComment" class="btn btn-default"
                                            value="Send Message">
                                    </div>

                                </form>
                            </div>
                        </div>


                        <script type="text/javascript">
                            $('#submitComment').bind('click', function(event) {
                                event.preventDefault();
                                var data = {
                                    'action': 'postcomment',
                                    'id_post': $('input[name=\'id_post\']').val(),
                                    'comment_parent': $('input[name=\'comment_parent\']').val(),
                                    'name': $('input[name=\'name\']').val(),
                                    'website': $('input[name=\'website\']').val(),
                                    'smartblogcaptcha': $('input[name=\'smartblogcaptcha\']').val(),
                                    'comment': $('textarea[name=\'comment\']').val(),
                                    'mail': $('input[name=\'mail\']').val()
                                };
                                $.ajax({
                                    url: baseDir + 'modules/smartblog/ajax.php',
                                    data: data,

                                    dataType: 'json',

                                    beforeSend: function() {
                                        $('.success, .warning, .error').remove();
                                        $('#submitComment').attr('disabled', true);
                                        $('#commentInput').before(
                                            '<div class="attention"><img src="http://321cart.com/sellya/catalog/view/theme/default/image/loading.gif" alt="" />Please wait!</div>'
                                            );

                                    },
                                    complete: function() {
                                        $('#submitComment').attr('disabled', false);
                                        $('.attention').remove();
                                    },
                                    success: function(json) {
                                        if (json['error']) {

                                            $('#commentInput').before('<div class="warning">' +
                                                '<i class="icon-warning-sign icon-lg"></i>' + json[
                                                    'error']['common'] + '</div>');

                                            if (json['error']['name']) {
                                                $('.inputName').after('<span class="error">' + json[
                                                    'error']['name'] + '</span>');
                                            }
                                            if (json['error']['mail']) {
                                                $('.inputMail').after('<span class="error">' + json[
                                                    'error']['mail'] + '</span>');
                                            }
                                            if (json['error']['comment']) {
                                                $('.inputContent').after('<span class="error">' + json[
                                                    'error']['comment'] + '</span>');
                                            }
                                            if (json['error']['captcha']) {
                                                $('.smartblogcaptcha').after('<span class="error">' +
                                                    json['error']['captcha'] + '</span>');
                                            }
                                        }

                                        if (json['success']) {
                                            $('input[name=\'name\']').val('');
                                            $('input[name=\'mail\']').val('');
                                            $('input[name=\'website\']').val('');
                                            $('textarea[name=\'comment\']').val('');
                                            $('input[name=\'smartblogcaptcha\']').val('');

                                            $('#commentInput').before('<div class="success">' + json[
                                                'success'] + '</div>');
                                            setTimeout(function() {
                                                $('.success').fadeOut(300).delay(450).remove();
                                            }, 2500);

                                        }
                                    }
                                });
                            });

                            var addComment = {
                                moveForm: function(commId, parentId, respondId, postId) {

                                    var t = this,
                                        div, comm = t.I(commId),
                                        respond = t.I(respondId),
                                        cancel = t.I('cancel-comment-reply-link'),
                                        parent = t.I('comment_parent'),
                                        post = t.I('comment_post_ID');

                                    if (!comm || !respond || !cancel || !parent)
                                        return;

                                    t.respondId = respondId;
                                    postId = postId || false;

                                    if (!t.I('wp-temp-form-div')) {
                                        div = document.createElement('div');
                                        div.id = 'wp-temp-form-div';
                                        div.style.display = 'none';
                                        respond.parentNode.insertBefore(div, respond);
                                    }


                                    comm.parentNode.insertBefore(respond, comm.nextSibling);
                                    if (post && postId)
                                        post.value = postId;
                                    parent.value = parentId;
                                    cancel.style.display = '';

                                    cancel.onclick = function() {
                                        var t = addComment,
                                            temp = t.I('wp-temp-form-div'),
                                            respond = t.I(t.respondId);

                                        if (!temp || !respond)
                                            return;

                                        t.I('comment_parent').value = '0';
                                        temp.parentNode.insertBefore(respond, temp);
                                        temp.parentNode.removeChild(temp);
                                        this.style.display = 'none';
                                        this.onclick = null;
                                        return false;
                                    };

                                    try {
                                        t.I('comment').focus();
                                    } catch (e) {}

                                    return false;
                                },

                                I: function(e) {
                                    return document.getElementById(e);
                                }
                            };

                        </script>



                        <style>

                        </style>
                    </div>


                </div>



                <div id="right-column" class="sidebar col-xs-12 col-sm-4 col-md-3">
                    <div class="nov-modules col-lg-12 col-md-12 no-padding">
                        <div class="block nov-wrap">
                            <div class="block-categories block">
                                <ul class="category-top-menu">
                                    <li class="title_block"><a
                                            href="http://demo.bestprestashoptheme.com/savemart/en/2-home">Categories</a>
                                    </li>
                                    <li>
                                        <ul class="category-sub-menu">
                                            <li data-depth="0"><a
                                                    href="http://demo.bestprestashoptheme.com/savemart/en/3-computer-networking">Computer
                                                    &amp; Networking</a>
                                                <div class="navbar-toggler collapse-icons" data-toggle="collapse"
                                                    data-target="#exCollapsingNavbar3"><i
                                                        class="material-icons add">add</i><i
                                                        class="material-icons remove">remove</i></div>
                                                <div class="collapse" id="exCollapsingNavbar3">
                                                    <ul class="category-sub-menu">
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/10-usb">USB</a><span
                                                                class="arrows" data-toggle="collapse"
                                                                data-target="#exCollapsingNavbar10"><i
                                                                    class="material-icons add">add</i><i
                                                                    class="material-icons remove">remove</i></span>
                                                            <div class="collapse" id="exCollapsingNavbar10">
                                                                <ul class="category-sub-menu">
                                                                    <li data-depth="2"><a class="category-sub-link"
                                                                            href="http://demo.bestprestashoptheme.com/savemart/en/11-usb-kingston">USB
                                                                            Kingston</a></li>
                                                                    <li data-depth="2"><a class="category-sub-link"
                                                                            href="http://demo.bestprestashoptheme.com/savemart/en/12-usb-sandisk">USB
                                                                            Sandisk</a></li>
                                                                    <li data-depth="2"><a class="category-sub-link"
                                                                            href="http://demo.bestprestashoptheme.com/savemart/en/13-usb-samsung">USB
                                                                            Samsung</a></li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/14-hard-disk">Hard
                                                                Disk</a><span class="arrows" data-toggle="collapse"
                                                                data-target="#exCollapsingNavbar14"><i
                                                                    class="material-icons add">add</i><i
                                                                    class="material-icons remove">remove</i></span>
                                                            <div class="collapse" id="exCollapsingNavbar14">
                                                                <ul class="category-sub-menu">
                                                                    <li data-depth="2"><a class="category-sub-link"
                                                                            href="http://demo.bestprestashoptheme.com/savemart/en/19-hard-disk-drive">Hard
                                                                            Disk Drive</a></li>
                                                                    <li data-depth="2"><a class="category-sub-link"
                                                                            href="http://demo.bestprestashoptheme.com/savemart/en/20-solid-state-drives">Solid
                                                                            State Drives</a></li>
                                                                    <li data-depth="2"><a class="category-sub-link"
                                                                            href="http://demo.bestprestashoptheme.com/savemart/en/21-sata">SATA</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/15-modem-wifi">Modem
                                                                WIFI</a></li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/16-keyboard">Keyboard</a><span
                                                                class="arrows" data-toggle="collapse"
                                                                data-target="#exCollapsingNavbar16"><i
                                                                    class="material-icons add">add</i><i
                                                                    class="material-icons remove">remove</i></span>
                                                            <div class="collapse" id="exCollapsingNavbar16">
                                                                <ul class="category-sub-menu">
                                                                    <li data-depth="2"><a class="category-sub-link"
                                                                            href="http://demo.bestprestashoptheme.com/savemart/en/22-keyboard-1">Keyboard
                                                                            1</a></li>
                                                                    <li data-depth="2"><a class="category-sub-link"
                                                                            href="http://demo.bestprestashoptheme.com/savemart/en/23-keyboard-2">Keyboard
                                                                            2</a></li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/17-mouse">Mouse</a>
                                                        </li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/18-monitor">Monitor</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li data-depth="0"><a
                                                    href="http://demo.bestprestashoptheme.com/savemart/en/6-laptop-accessories">Laptop
                                                    &amp; Accessories</a>
                                                <div class="navbar-toggler collapse-icons" data-toggle="collapse"
                                                    data-target="#exCollapsingNavbar6"><i
                                                        class="material-icons add">add</i><i
                                                        class="material-icons remove">remove</i></div>
                                                <div class="collapse" id="exCollapsingNavbar6">
                                                    <ul class="category-sub-menu">
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/7-laptop-1">Laptop
                                                                1</a></li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/8-laptop-2">Laptop
                                                                2</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li data-depth="0"><a
                                                    href="http://demo.bestprestashoptheme.com/savemart/en/9-smartphone-tablet">Smartphone
                                                    &amp; Tablet</a>
                                                <div class="navbar-toggler collapse-icons" data-toggle="collapse"
                                                    data-target="#exCollapsingNavbar9"><i
                                                        class="material-icons add">add</i><i
                                                        class="material-icons remove">remove</i></div>
                                                <div class="collapse" id="exCollapsingNavbar9">
                                                    <ul class="category-sub-menu">
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/24-apple">Apple</a>
                                                        </li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/25-samsung">Samsung</a>
                                                        </li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/26-motorola">Motorola</a>
                                                        </li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/27-chargers">Chargers</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li data-depth="0"><a
                                                    href="http://demo.bestprestashoptheme.com/savemart/en/4-home-appliance">Home
                                                    Appliance</a></li>
                                            <li data-depth="0"><a
                                                    href="http://demo.bestprestashoptheme.com/savemart/en/5-camera-photo">Camera
                                                    &amp; Photo</a>
                                                <div class="navbar-toggler collapse-icons" data-toggle="collapse"
                                                    data-target="#exCollapsingNavbar5"><i
                                                        class="material-icons add">add</i><i
                                                        class="material-icons remove">remove</i></div>
                                                <div class="collapse" id="exCollapsingNavbar5">
                                                    <ul class="category-sub-menu">
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/28-camera-1">Camera
                                                                1</a></li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/29-camera-2">Camera
                                                                2</a></li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/30-photo-1">Photo
                                                                1</a></li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/31-photo-2">Photo
                                                                2</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li data-depth="0"><a
                                                    href="http://demo.bestprestashoptheme.com/savemart/en/32-audio">Audio</a>
                                                <div class="navbar-toggler collapse-icons" data-toggle="collapse"
                                                    data-target="#exCollapsingNavbar32"><i
                                                        class="material-icons add">add</i><i
                                                        class="material-icons remove">remove</i></div>
                                                <div class="collapse" id="exCollapsingNavbar32">
                                                    <ul class="category-sub-menu">
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/33-headphone">Headphone</a>
                                                        </li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/34-wireless-speaker">Wireless
                                                                Speaker</a></li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/35-bluetooth-speaker">Bluetooth
                                                                Speaker</a></li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/36-mini-speaker">Mini
                                                                Speaker</a></li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/37-sound-card">Sound
                                                                Card</a></li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/38-accessories">Accessories</a>
                                                        </li>
                                                        <li data-depth="1"><a class="category-sub-link"
                                                                href="http://demo.bestprestashoptheme.com/savemart/en/39-earbuds-and-in-ear">Earbuds
                                                                and In-ear</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="nov-modules col-lg-12 col-md-12 no-padding">
                        <div class="block nov-wrap">
                            <div class="title_block">Recent posts</div>
                            <div class="block block-recentpost">
                                <div class="block_content sdsbox-content">
                                    <div class="recentArticles">
                                        <div class="post-item">

                                            <a class="post-title" title="Lorem ipsum dolor sit amet"
                                                href="http://demo.bestprestashoptheme.com/savemart/en/blog/18_Lorem-ipsum-dolor-sit-amet.html">Lorem
                                                ipsum dolor sit amet</a>
                                            <div class="post-info">
                                                <span class="comment">
                                                    <i class="zmdi zmdi-comments"></i>
                                                    <a title="0 Comments"
                                                        href="http://demo.bestprestashoptheme.com/savemart/en/blog/18_Lorem-ipsum-dolor-sit-amet.html#articleComments">0
                                                        Comments</a>
                                                </span>
                                                <span class="datetime">
                                                    <i class="zmdi zmdi-calendar-note"></i>July 20, 2018 </span>
                                            </div>
                                            <div class="post-description">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. In placerat eleifend est et efficitur. Integer in felis sed dui
                                                rhoncus dapibus id nec leo. Sed vitae enim id enim pharetra consectetur.
                                                Phasellus mattis, quam porttitor...</div>

                                            <div class="readmore"><a
                                                    href="http://demo.bestprestashoptheme.com/savemart/en/blog/18_Lorem-ipsum-dolor-sit-amet.html">Read
                                                    more</a></div>

                                        </div>
                                        <div class="post-item">

                                            <a class="post-title" title="Lorem ipsum dolor sit amet"
                                                href="http://demo.bestprestashoptheme.com/savemart/en/blog/17_Lorem-ipsum-dolor-sit-amet.html">Lorem
                                                ipsum dolor sit amet</a>
                                            <div class="post-info">
                                                <span class="comment">
                                                    <i class="zmdi zmdi-comments"></i>
                                                    <a title="0 Comments"
                                                        href="http://demo.bestprestashoptheme.com/savemart/en/blog/17_Lorem-ipsum-dolor-sit-amet.html#articleComments">0
                                                        Comments</a>
                                                </span>
                                                <span class="datetime">
                                                    <i class="zmdi zmdi-calendar-note"></i>May 08, 2018 </span>
                                            </div>
                                            <div class="post-description">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. In placerat eleifend est et efficitur. Integer in felis sed dui
                                                rhoncus dapibus id nec leo. Sed vitae enim id enim pharetra consectetur.
                                                Phasellus mattis, quam porttitor...</div>

                                            <div class="readmore"><a
                                                    href="http://demo.bestprestashoptheme.com/savemart/en/blog/17_Lorem-ipsum-dolor-sit-amet.html">Read
                                                    more</a></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nov-modules col-lg-12 col-md-12 no-padding">
                        <div class="block nov-wrap">
                            <!-- Block tags module -->
                            <div id="tags_block_left" class="block tags_block">
                                <div class="title_block">Product tags</div>
                                <div class="block_content">
                                    <a href="http://demo.bestprestashoptheme.com/savemart/en/search?tag=sony"
                                        title="More about sony" class="tag_level2 first_item">sony</a>
                                    <a href="http://demo.bestprestashoptheme.com/savemart/en/search?tag=samsung"
                                        title="More about samsung" class="tag_level2 item">samsung</a>
                                    <a href="http://demo.bestprestashoptheme.com/savemart/en/search?tag=smart+phone"
                                        title="More about smart phone" class="tag_level2 item">smart phone</a>
                                    <a href="http://demo.bestprestashoptheme.com/savemart/en/search?tag=ipad"
                                        title="More about ipad" class="tag_level1 item">ipad</a>
                                    <a href="http://demo.bestprestashoptheme.com/savemart/en/search?tag=smart+watches"
                                        title="More about smart watches" class="tag_level1 item">smart watches</a>
                                    <a href="http://demo.bestprestashoptheme.com/savemart/en/search?tag=smartphone"
                                        title="More about smartphone" class="tag_level1 item">smartphone</a>
                                    <a href="http://demo.bestprestashoptheme.com/savemart/en/search?tag=apple"
                                        title="More about apple" class="tag_level2 item">apple</a>
                                    <a href="http://demo.bestprestashoptheme.com/savemart/en/search?tag=iphone"
                                        title="More about iphone" class="tag_level3 last_item">iphone</a>
                                </div>
                            </div>
                            <!-- /Block tags module -->
                        </div>
                    </div>
                    <div class="nov-image col-lg-12 col-md-12 no-padding">
                        <div class="block">
                            <div class="block_content">
                                <div class="effect">
                                    <a href="#"> <img class="img-fluid"
                                            src="/savemart/modules/novpagemanage/img/0f36cf52b3cbb1fa79946f9c06282a68.jpg"
                                            alt="Banner" title="Banner"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
