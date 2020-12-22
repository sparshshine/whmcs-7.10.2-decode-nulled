<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

$this->layout("layouts/learn", $serviceOffering);
$this->start("nav-tabs");
echo "    <li class=\"active\" role=\"presentation\">\n        <a aria-controls=\"about\" data-toggle=\"tab\" href=\"#about\" role=\"tab\">About</a>\n    </li>\n    <li role=\"presentation\">\n        <a aria-controls=\"features\" data-toggle=\"tab\" href=\"#features\" role=\"tab\">Features</a>\n    </li>\n    <li role=\"presentation\">\n        <a aria-controls=\"pricing\" data-toggle=\"tab\" href=\"#pricing\" role=\"tab\">Pricing</a>\n    </li>\n    <li role=\"presentation\">\n        <a aria-controls=\"reviews\" data-toggle=\"tab\" href=\"#reviews\" role=\"tab\">User Reviews</a>\n    </li>\n    <li role=\"presentation\">\n        <a aria-controls=\"why\" data-toggle=\"tab\" href=\"#why\" role=\"tab\">Why SEO Tools?</a>\n    </li>\n    <li role=\"presentation\">\n        <a aria-controls=\"faq\" data-toggle=\"tab\" href=\"#faq\" role=\"tab\">FAQ</a>\n    </li>\n";
$this->end();
$this->start("content-tabs");
echo "    <div class=\"tab-pane active\" id=\"about\" role=\"tabpanel\">\n        <div class=\"content-padded marketgoo about\">\n            <h3>Resellable SEO Tools for Web Hosters</h3>\n            <h4>Get more renewals and increase customer spend by helping your customers get the traffic and search rankings they want - no technical skills required.</h4>\n\n            <br>\n\n            <div class=\"row\">\n                <div class=\"col-sm-4\">\n                    <img src=\"../assets/img/marketconnect/marketgoo/dashboard.png\">\n                </div>\n                <div class=\"col-sm-8\">\n\n                    <p>Differentiate your services by offering your customers an SEO tool that will get real results for their business. How does it work? It’s easy as 1-2-3 for you and for your customers.</p>\n\n                    <ul>\n                        <li>After you enable marketgoo, your customers will be able to sign up for <strong>marketgoo lite</strong>, which will scan their site and instantly provide an SEO Report and Improvement Plan.</li>\n                        <li>The customer can use it as a <strong>checklist to improve their SEO issues</strong>, track and optimize for a few keywords and download their PDF Report every month.</li>\n                        <li>If they want <strong>step-by-step instructions</strong> on how to make all the recommended improvements, along with more keyword optimization and competitor monitoring, they can upgrade to <strong>marketgoo PRO</strong>.</li>\n                    </ul>\n\n                </div>\n            </div>\n\n            <p>That's it! they’re on their way to optimizing their website by themselves and with no technical knowledge required.</p>\n\n        </div>\n    </div>\n\n    <div class=\"tab-pane\" id=\"features\" role=\"tabpanel\">\n        <div class=\"content-padded marketgoo features\">\n\n            <h3>The Only resellable SEO tool designed specifically for hosters</h3>\n\n            <br>\n\n            <p>We come from the Hosting industry and understand the unique challenges that you face in providing quality solutions and support to a price-sensitive customer. We also have almost a decade of experience serving SMBs, and we know what they look for in SEO tools.</p>\n\n            <div class=\"row\">\n                <div class=\"col-sm-4\">\n                    <img src=\"../assets/img/marketconnect/marketgoo/feat-seo.svg\">\n                    <strong>SEO Plan</strong><br>\n                    A clear report with recommendations tailored for their site\n                </div>\n                <div class=\"col-sm-4\">\n                    <img src=\"../assets/img/marketconnect/marketgoo/feat-instructions.svg\">\n                    <strong>Step by Step Instructions</strong><br>\n                    Instructions designed for non-tech savvy users with examples, videos and explanations\n                </div>\n                <div class=\"col-sm-4\">\n                    <img src=\"../assets/img/marketconnect/marketgoo/feat-report.svg\">\n                    <strong>Monthly Report</strong><br>\n                    Every month, users get a PDF report with their site's SEO progress\n                </div>\n            </div>\n            <div class=\"row\">\n                <div class=\"col-sm-4\">\n                    <img src=\"../assets/img/marketconnect/marketgoo/feat-competitor.svg\">\n                    <strong>Competitor research and monitoring</strong><br>\n                    See what competitors are doing to get traffic and how you compare\n                </div>\n                <div class=\"col-sm-4\">\n                    <img src=\"../assets/img/marketconnect/marketgoo/feat-keyword.svg\">\n                    <strong>Keyword research and monitoring</strong><br>\n                    Recommendations for keywords as well as manual input supported\n                </div>\n                <div class=\"col-sm-4\">\n                    <img src=\"../assets/img/marketconnect/marketgoo/feat-optimitation.svg\">\n                    <strong>Individual Page Optimization</strong><br>\n                    Guided optimization for individual pages with detailed keyword analysis\n                </div>\n            </div>\n\n        </div>\n    </div>\n\n    <div class=\"tab-pane\" id=\"pricing\" role=\"tabpanel\">\n        <div class=\"content-padded marketgoo pricing\">\n            ";
if ($feed->isNotAvailable()) {
    echo "                <div class=\"pricing-login-overlay\">\n                    <p>To view pricing, you must first register or login to your MarketConnect account.</p>\n                    <button type=\"button\" class=\"btn btn-default btn-sm btn-login\">Login</button> <button type=\"button\" class=\"btn btn-default btn-sm btn-register\">Create Account</button>\n                </div>\n            ";
}
echo "\n            <table class=\"table table-pricing\">\n                ";
$productInfo = $feed->getServicesByGroupId("marketgoo");
$planNames = array();
$planFeatures = array();
foreach ($productInfo as $plan) {
    $name = $plan["display_name"];
    if ($plan["id"] == "marketgoo_pro") {
        $name .= " <span class=\"label label-primary\">Best value!</span>";
    }
    $planNames[] = $name;
    $planFeatures[$plan["id"]] = $promotionHelper->getPlanFeatures($plan["id"]);
}
echo "<tr><th></th><th>" . implode("</th><th>", $planNames) . "</th></tr>";
foreach (current($planFeatures) as $key => $value) {
    echo "<tr><td>" . $key . "</td>";
    foreach ($productInfo as $plan) {
        $feature = $planFeatures[$plan["id"]][$key];
        if (is_bool($feature)) {
            $feature = "<img src=\"../assets/img/marketconnect/marketgoo/icon-check.svg\">";
        }
        echo "<td> " . $feature . "</td>";
    }
    echo "</tr>";
}
$recommendedRetail = array();
foreach ($productInfo[0]["terms"] as $term) {
    $currentTerm = $term["term"];
    echo "<tr><td>Your Cost (" . (new WHMCS\Billing\Cycles())->getNameByMonths($currentTerm) . ")</td>";
    foreach ($productInfo as $plan) {
        foreach ($plan["terms"] as $term) {
            if ($term["term"] != $currentTerm) {
                continue;
            }
            echo "<td>" . formatCurrency($term["price"]) . "</td>";
            $recommendedRetail[] = "<td>" . formatCurrency($term["recommendedRrp"]) . "</td>";
        }
    }
    echo "</tr>";
    break;
}
echo "<tr><td>Recommended Retail Price (" . (new WHMCS\Billing\Cycles())->getNameByMonths($currentTerm) . ")</td>" . implode($recommendedRetail) . "</td></tr>";
echo "            </table>\n        </div>\n    </div>\n\n    <div class=\"tab-pane\" id=\"reviews\" role=\"tabpanel\">\n        <div class=\"content-padded marketgoo reviews\">\n\n            <h3>Trusted by over 60,000+ users Worldwide</h3>\n\n            <br>\n\n            <div class=\"row\">\n                <div class=\"col-sm-6\">\n                    <div class=\"testimonial\">\n                        <p>\"Such a simple reliable platform! It’s helped me see where we stand next to our local competitors. It’s part of our day to day. The best feature is the keyword tool.\"</p>\n                        <div class=\"user\">\n                            <img src=\"../assets/img/marketconnect/marketgoo/user-testimonial-3.jpg\">\n                            <strong>Simon Saleh</strong><br>\n                            Wanderlust Ironworks\n                        </div>\n                    </div>\n                    <div class=\"testimonial\">\n                        <p>\"Without marketgoo I would never have been able to have my website on the first page of Google for all the keywords that are linked to my business, its ease of use and the customer service when I’ve needed help has been first class. It really has helped my business with been online more than I could have ever dreamed.\"</p>\n                        <div class=\"user\">\n                            <img src=\"../assets/img/marketconnect/marketgoo/user-testimonial-2.jpg\">\n                            <strong>Ian Glass</strong><br>\n                            Ian Glass Fitness\n                        </div>\n                    </div>\n                </div>\n                <div class=\"col-sm-6\">\n                    <div class=\"testimonial\">\n                        <p>\"marketgoo reports give me everything I need to know for my site’s SEO. I am constantly fine-tuning my site to work towards a higher rating. I read various marketgoo reports, then immediately work out how to implement recommendations.\"</p>\n                        <div class=\"user\">\n                            <img src=\"../assets/img/marketconnect/marketgoo/user-testimonial-4.jpg\">\n                            <strong>Svein Koningen</strong><br>\n                            Koningen Art\n                        </div>\n                    </div>\n                    <div class=\"testimonial\">\n                        <p>\"I like marketgoo because it’s so easy for a small company like us to improve our service and site overall without being an expert. It helped my company to be in one of the 3 first Google pages for our main keywords.\"</p>\n                        <div class=\"user\">\n                            <img src=\"../assets/img/marketconnect/marketgoo/user-testimonial-5.jpg\">\n                            <strong>Fanny V</strong><br>\n                            Dunes Event\n                        </div>\n                    </div>\n                </div>\n            </div>\n\n        </div>\n    </div>\n\n    <div class=\"tab-pane\" id=\"why\" role=\"tabpanel\">\n        <div class=\"content-padded marketgoo why\">\n\n            <h3>The quickest way to increase the revenue you get per customer</h3>\n\n            <br>\n\n            <p>SEO tools have a <strong>high uptake rate</strong>, provide good margins and have not yet been commoditized - offering them can be a powerful differentiator for you.</p>\n\n            <div class=\"row\">\n                <div class=\"col-sm-4\">\n                    <div class=\"why-item\">\n                        <span>\$497.16</span>\n                        <p>Average american small business spent per month on <strong>SEO services.</strong></p>\n                    </div>\n                </div>\n                <div class=\"col-sm-4\">\n                    <div class=\"why-item\">\n                        <span>47%</span>\n                        <p>Percentage of small business owners that handle marketing efforts on their own.</p>\n                    </div>\n                </div>\n                <div class=\"col-sm-4\">\n                    <div class=\"why-item no-border\">\n                        <span>54%</span>\n                        <p>Percentage of SMBs that say they rely on <strong>in-house efforts</strong> for SEO</p>\n                    </div>\n                </div>\n            </div>\n\n        </div>\n    </div>\n\n    <div class=\"tab-pane\" id=\"faq\" role=\"tabpanel\">\n        <div class=\"content-padded marketgoo faq\">\n\n            <h3>Frequently Asked Questions</h3>\n\n            <br>\n\n            <div class=\"row\">\n                <div class=\"col-sm-5\">\n\n                    <p><strong>What is Marketgoo</strong></p>\n                    <iframe src=\"https://player.vimeo.com/video/394484761\" width=\"320\" height=\"180\" frameborder=\"0\" allow=\"fullscreen\" allowfullscreen></iframe>\n\n                </div>\n                <div class=\"col-sm-7\">\n\n                    <p><strong>Who provides Support for the Users that acquire marketgoo through me?</strong><br><br>\n                    As a marketgoo reseller, you will handle first-level support, which most often concerns billing or basic SEO questions. To efficiently help your customers you can access the marketgoo knowledge base. In the case of technical or product-related issues, marketgoo provides second-level support to all resellers.</p>\n\n                    <p><strong>Does marketgoo make the suggested site changes, or otherwise help implement the SEO recommendations it makes?</strong><br><br>\n                    No. marketgoo is a Do-it-Yourself tool, so while it performs an analysis of the user’s site and gives recommendations, tasks and instructions to optimise it, marketgoo does not make these changes for the user, nor do we offer that as an add-on service. </p>\n                </div>\n            </div>\n\n        </div>\n    </div>\n\n    <div class=\"tab-pane\" id=\"activate\" role=\"tabpanel\">\n        ";
$this->insert("shared/configuration-activate", array("currency" => $currency, "service" => $service, "firstBulletPoint" => "Offer all Marketgoo Services", "availableForAllHosting" => true, "landingPageRoutePath" => "store-marketgoo-index", "serviceOffering" => $serviceOffering, "billingCycles" => $billingCycles, "products" => $products, "serviceTerms" => $serviceTerms));
echo "    </div>\n\n<style>\n.marketgoo.about img {\n    width: 100%;\n}\n.marketgoo ul {\n    list-style: none;\n    margin: 0;\n    padding: 0;\n}\n.marketgoo.about li {\n    margin-left: 32px;\n    padding-bottom: 7px;\n}\n.marketgoo.about li::before {\n    content: \"\\2022\";\n    color: #ccc;\n    font-weight: bold;\n    padding-right: 12px;\n    padding-bottom: 10px;\n    margin-left: -20px;\n    font-size: 22px;\n    line-height: 10px;\n}\n.marketgoo.features img {\n    display: block;\n    max-width: 70px;\n}\n.marketgoo.pricing td {\n    line-height: 25px;\n    width: 33.3%;\n}\n.marketgoo.pricing td:first-child {\n    border-right: 1px solid #ddd;\n}\n.marketgoo.pricing td:last-child {\n    background-color: #eee;\n}\n.marketgoo.pricing span {\n    font-weight: bold;\n}\n.marketgoo.reviews .row {\n    margin-left: -4px;\n    margin-right: -4px;\n}\n.marketgoo.reviews .row .col-sm-6 {\n    padding-left: 4px;\n    padding-right: 4px;\n}\n.marketgoo.reviews .testimonial {\n    margin: 8px 0;\n    padding: 10px;\n    border: 1px solid #ddd;\n    border-radius: 3px;\n}\n.marketgoo.reviews .testimonial .user {\n    border-top: 1px solid #ddd;\n    padding-top: 5px;\n    font-size: 0.8em;\n}\n.marketgoo.reviews .testimonial .user img {\n    float: left;\n    padding-right: 15px;\n    max-width: 50px;\n}\n.marketgoo.why .why-item {\n    margin: 20px 0;\n    padding: 20px 20px 20px 0;\n    border-right: 2px solid #ddd;\n    height: 150px;\n}\n.marketgoo.why .why-item.no-border {\n    border: 0;\n}\n.marketgoo.why .why-item span {\n    font-size: 2.4em;\n}\n</style>\n";
$this->end();

?>