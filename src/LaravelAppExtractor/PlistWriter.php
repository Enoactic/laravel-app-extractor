<?php

namespace LaravelAppExtractor;

use DOMDocument;

class PlistWriter
{
    public static function getIOSManifestPlist($filePath, $bundle, $version, $appName, $savePath)
    {
        $xmlString = '<?xml version="1.0" encoding="UTF-8"?>
                        <!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
                        <plist version="1.0">
                        <dict>
                            <key>items</key>
                            <array>
                                <dict>
                                    <key>assets</key>
                                    <array>
                                        <dict>
                                            <key>kind</key>
                                            <string>software-package</string>
                                            <key>url</key>
                                            <string>'.$filePath.'</string>
                                        </dict>
                                    </array>
                                    <key>metadata</key>
                                    <dict>
                                        <key>bundle-identifier</key>
                                        <string>'.$bundle.'</string>
                                        <key>bundle-version</key>
                                        <string>'.$version.'</string>
                                        <key>kind</key>
                                        <string>software</string>
                                        <key>title</key>
                                        <string>'.$appName.'</string>
                                    </dict>
                                </dict>
                            </array>
                        </dict>
                        </plist>';

        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($xmlString);

        $dom->save($savePath);

        return ;
    }
}
