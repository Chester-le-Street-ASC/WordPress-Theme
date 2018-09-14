<!-- SHARING PHP MODULE -->

    <h3 class="m-t-0">Share this</h3>
        <div class="row no-gutters sharing">
            <div class="col">
            <a target="_blank" class="btn btn-dark btn-block" href="mailto:?subject=<?php rawurlencode(the_title()); ?> - Shared from Chester-le-Street ASC&body=<?php rawurlencode(the_permalink()); ?>"><i class="fa  fa-envelope" aria-hidden="true"></i><span class="sr-only sr-only-focusable">Share by Email</span></a>
            </div>

            <div class="col">
            <a target="_self" class="btn btn-dark btn-block" href="javascript:window.print()"><i class="fa fa-print" aria-hidden="true"></i><span class="sr-only sr-only-focusable">Print</span></a>
            </div>

            <div class="col">
            <a target="_blank" class="btn btn-fb btn-block" href="http://www.facebook.com/sharer.php?u=<?php rawurlencode(the_permalink());?>&amp;t=<?php rawurlencode(the_title()); ?>"><i class="fa fa-facebook" aria-hidden="true"></i><span class="sr-only sr-only-focusable">Share on Facebook</span></a>
            </div>

            <div class="col">
            <a target="_blank" class="btn btn-tweet btn-block" href="https://twitter.com/intent/tweet?text=<?php rawurlencode(the_title()); ?>&url=<?php rawurlencode(the_permalink()); ?>"><i class="fa fa-twitter" aria-hidden="true"></i><span class="sr-only sr-only-focusable">Share on Twitter</span></a>
            </div>

            <div class="col">
            <a target="_blank" class="btn btn-whatsapp btn-block" href="https://wa.me/?text=<?php rawurlencode(the_permalink()); ?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp" aria-hidden="true"></i><span class="sr-only sr-only-focusable">Share with Whatsapp</span></a>
            </div>

            <div class="col">
            <a target="_blank" class="btn btn-pinterest btn-block" href="http://pinterest.com/pin/create/button/?url=<?php rawurlencode(the_permalink()); ?>&media=https%3A%2F%2Fwww.chesterlestreetasc.co.uk%2Fwp-content%2Fuploads%2F2016%2F06%2Fcls.png&description=Article"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
            </div>

            <div class="col">
            <a target="_blank" class="btn btn-linkedin btn-block" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php rawurlencode(the_permalink()); ?>&title=<?php rawurlencode(the_title()); ?>&source=CLS%20ASC"><i class="fa fa-linkedin" aria-hidden="true"></i><span class="sr-only sr-only-focusable">Share on Linked In</span></a>
            </div>
        </div>

        <p class="small sharingterms">CLS ASC is not responsible for these services</p>
