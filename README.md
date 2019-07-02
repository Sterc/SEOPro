# SEOPro
**Author:** Sterc (<modx@sterc.nl>)  
**Version:** 1.2.2

## Description
[SEOPro][2] is a MODX Extra developed by [Sterc][1]. This Extra offers you guidelines in the process of optimizing your webpage for search engines. It enables you to enter focus keywords per page. Based on that input, SEOPro provides you with feedback on the SEO quality of your pagetitle, longtitle, description and alias by checking if the keywords are present.

## Workflow
After installing SEOPro on your website (SEOPro can be found in the package manager), the following workflow is intended:

1. Pick a page on your MODX website which you would like to optimize for search engines and click it.
2. As you can see, the regular interface is extended with some new features, among which is a new field called 'Focus keywords'. Here enter the keywords you would like to optimize your page for (to add more than one keyword, use a comma to separate them).
3. Now take a look at the input fields with a 'Keywords' label. Make sure you turn the grey thumbs down into green thumbs up by adding one or more keywords to these fields. Also make sure you don't exceed the given length.
4. Save it. The webpage is now optimized for search engines and can be further improved when future features are added.

*Note:* try to limit the amount of focus keywords to gain more effectivity.  
**Tip:** use [Google's Keyword Tool][3] to determine which keywords to focus on.

### Placeholders
* To set the ultimate SEO pagetitle, you can use `[[+seoPro.title]]`.
* To add your keywords to the page, you can use `[[+seoPro.keywords]]`.

### Using a TV for the keywords?
You can use [this gist][4] to convert a TV value to SEOPro.

## Requirements
* [MODX version 2.5.0 or newer][5] has to be installed.
* [PHP version 5.6 or newer][6] has to be installed.

## Future features
* Offer SEO guidelines for the content field of a webpage.

## Bugs and feature requests
We greatly value your feedback, feature requests and bug reports. Please issue them on [GitHub][7].

[1]: https://www.sterc.nl/en/
[2]: https://www.sterc.nl/en/modx-extras/seopro
[3]: https://adwords.google.com/KeywordPlanner
[4]: https://gist.github.com/frisospeulman/7751607
[5]: https://modx.com/download
[6]: https://secure.php.net/releases/
[7]: https://github.com/Sterc/SEOPro

# Free Extra
This is a free extra and the code is publicly available for you to change. The extra is being actively maintained and you're free to put in pull requests which match our roadmap. Please create an issue if the pull request differs from the roadmap so we can make sure we're on the same page.

Need help? [Approach our support desk for paid premium support.](mailto:service@sterc.com)

