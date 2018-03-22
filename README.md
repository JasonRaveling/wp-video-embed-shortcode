# Video Embed Shortcode Plugin for WordPress
This WordPress plugin lets you embed videos that are mobile friendly using a shortcode for YouTube, Vimeo, and PBS.

# Installation
Extract the zip or clone the repo to your plugins directory in WordPress. Then login to WordPress and activate the plugin.

# Instructions
There is an individual shortcode for each video platform. Each shortcode accepts some additional parameters for cusomizing how the video is embeded.

| Platform | Shortcode | Example                                         |
|----------|-----------|-------------------------------------------------|
| YouTube  | [youtube] | [youtube]https://youtu.be/cdcTY5GhHuk[/youtube] |
| Vimeo    | [vimeo]   | [vimeo]https://vimeo.com/13327616[/vimeo]       |
| PBS      | [pbsvid]  | [pbsvid]3000337052[/pbsvid]                     |

## Width & Height

You can declare the width and height in pixels. If you only set the width, the height will automatically be calculated to retain a 16:9 aspect ratio. If no width is provided or only a height is provided, the embed will default to 1400 pixels wide but will shrink as needed to only take up 100% of the width of the container it is in. Below are some examples using the YouTube shortcode but the height and width can be set in the same way with any of the shortcodes.

The example below will display a video at a maximum of 1400 pixels wide with the height automatically being calculated.

    [youtube]https://youtu.be/cdcTY5GhHuk[/youtube]

The example below will display a video a 800 pixels wide with the height automatically being calculated.

    [youtube width="800"]https://youtu.be/cdcTY5GhHuk[/youtube]

The example below will display a video that is 400 wide by 200 pixels tall.

    [youtube width="400" height="200"]https://youtu.be/cdcTY5GhHuk[/youtube]

##  Alignment

You can also set the alignment of the embeded video. The alignment will be set using the builtin WordPress classes for aligning objects. Here are some examples using YouTube. The alignment can be set in the same way for all of the shortcodes.

The example below will align the video to the right.

    [youtube align="right"]https://youtu.be/cdcTY5GhHuk[/youtube]

The example below will align the video to the left as well as set the width.

    [youtube align="left" width="220"]https://youtu.be/cdcTY5GhHuk[/youtube]
