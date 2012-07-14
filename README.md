# KKRetinaPlease

A lightweight library to simplify the adding of Retina graphics to your site.
Designed to stay out of your way as much as possible. For people like me.

Requires jQuery. Sorry.

Coded by @sleepy_keita. He was probably sleeping the whole time.

Documentation:

Before:

    <img src="ugly.png" />

After:

    <img src="<?php KKRP::src('pretty.png'); ?>" />

-- or --

    <?php KKRP::img('pretty.png', array()); ?>

Where the array() is filled with attributes and values of the image tag. Array values are
allowed; they will be imploded with a ' '.

Note #1: If you use (1), you need to attach the "autoRetina" class for after-the-fact
JavaScript image replacement. (2) will append this class automatically.

Note #2: You will be responsible for sizing the picture accordingly.

Note #3: At the end of your HTML file you'll need

    <?php KKRP::js(); ?>

Before the `</body>` tag, to enable auto-switching and tracking. This is no longer
required, but still recommended. PHP will automatically print the JS if it hasn't been
printed yet, but this will probably occur AFTER the `</html>` tag.

## How it Works

The JavaScript snippet basically "tells" the server, after the first load, that this user
requires Retina images. To cover that first load, the JS will go through all your images
with the `autoRetina` class attached, and will dynamically load the Retina images on a
device with a Retina screen.
