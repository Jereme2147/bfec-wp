<!-- menu to be displayed on all portfolio pages -->
<div id="portfolio-menu">
    <div class="portfolio-page-mobile-nav" id="mobile-nav"> 
        <div id="mobile-hamburger" onclick="burger('mobile-hamburger')">
            <h3>Select Categories</h3>
            <i class="fas fa-bars"></i>
        </div>
        <div class="mobile-menu-open" id="portfolio-page-mobile-menu-open">
            <ul>
                <a href="<?php echo site_url()?>/portfolio/">
                    <li>All Categories</li></a>
                <a href="<?php echo site_url()?>/portfolio-category-stream-wetland/">
                    <li>Stream and Wetland Restoration</li></a>
                <a href="<?php echo site_url()?>/portfolio-category-mitigation/">
                    <li>Mitigation</li></a>
                <a href="<?php echo site_url()?>'/portfolio-items/stream-and-wetland-delineations/">
                    <li>Stream and Wetland Delineations</li></a>
                <a href="<?php echo site_url()?>/portfolio-items/environmental-permitting/">
                    <li>Environmental Permitting</li></a>
                <a href="<?php echo site_url()?>/portfolio-items/innovative-stormwater/">
                    <li>Innovative Stormwater Solutions</li></a>
                <a href="<?php echo site_url()?>/portfolio-items/environmental-site-assessments/">
                    <li>Environmental Site Assessments</li></a>
                <li onclick="burger('mobile-hamburger')">-Close-</li>
            </ul>
        </div>
    </div>
        <div class="portfolio-desktop-nav">
            <div class="portfolio-desktop-menu card-right">
                <ul>
                    <a href="<?php echo site_url()?>/portfolio/"><li id="portfolio-all-categories">-All Categories-</li></a>
                </ul>
                <ul>
                    <a href="<?php echo site_url()?>/portfolio-category-stream-wetland/">
                        <li>-Stream and Wetland Restoration-</li></a>
                    <a href="<?php echo site_url()?>/portfolio-category-mitigation/">
                        <li>-Mitigation-</li></a>
                    <a href="<?php echo site_url()?>/portfolio-items/stream-and-wetland-delineations/">
                        <li>-Stream and Wetland Delineations-</li></a>
                    <a href="<?php echo site_url()?>/portfolio-items/environmental-permitting/">
                        <li>-Environmental Permitting-</li></a>
                    <a href="<?php echo site_url()?>/portfolio-items/innovative-stormwater/">
                        <li>-Innovative Stormwater Solutions-</li></a>
                    <a href="<?php echo site_url()?>/portfolio-items/environmental-site-assessments/">
                        <li>-Environmental Site Assessments-</li></a>
                </ul>
            </div>
        </div>

</div>
