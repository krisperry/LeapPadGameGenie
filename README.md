# LeapPadGameGenie
Web based simple meta.inf &amp; GameInfo.json editor capable of wrapping/padding and packaging .swf into .tar file that will be installable via LeapPad Manager.

Contents
/genie.php (Main/Application Page, should/would preferably be reworked as genie/index.php. I don't think the issue is here so I should leave it be.)
/process.php (Processing script, Currently theres an issue with the upload section blanking out. preview and generate seem to work well.)
/upload.php (Original upload.php that process.php has grown from. currently polyfilled to formFiles to allow uploads to /temp(wrong location)
