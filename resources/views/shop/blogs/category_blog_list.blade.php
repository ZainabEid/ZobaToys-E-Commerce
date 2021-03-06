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
                <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="blogwapper one-columns">
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
            </div>
        </div>



    </div>
@endsection
