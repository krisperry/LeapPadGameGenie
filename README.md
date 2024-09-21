# LeapPadGameGenie
Web based simple meta.inf &amp; GameInfo.json editor capable of packaging a .swf file into .tar file with all the necessary wrapping and padding so that it will be installable on LeapPad and/or LeapsterGS devices via "LeapPad Manager - By Deak Phreak and is0Mick|v7.5.0"

Contents

/genie.php

(Main/Application Page, should/would ideally be reworked as /genie/index.php. I don't think the issue is here so I should leave it be.)

/process.php

(Processing script, Currently theres an issue with the upload section blanking out. preview and generate seem to work well.)

/upload.php

(Original upload.php that process.php has grown from. currently polyfilled to formFiles to allow uploads to /temp(wrong location)
