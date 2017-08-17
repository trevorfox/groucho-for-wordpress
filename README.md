Groucho for Wordpress
Wordpress plugin to enable the Groucho javascript tracking and personalization library

This plugin, based on [Wordpress Plugin Boilerplate](https://wppb.me/), loads [Groucho](https://github.com/tableau-mkt/groucho) and its dependencies and pushes Wordpress page and post taxonomies to the dataLayer if terms exist for that page. Admitedly, WPPB is a bit bloated for this project but it provides a good framework and can be further pruned down.

Page-level data that is pushed to the dataLayer looks like this:

```
{
  "grouchoTaxonomy": {
    "category": {                                 // Wordpress Category
      "2": "digital-marketing-technical-skills"
    },
    "post_tag": {                                 // Wordpress Post Tags
      "22": "database",
      "24": "digital-marketing",
      "43": "python",
      "14": "javascript"
    }
  }
}
```

This allows you to track user behavior and personalize web experiences based on the categories and content that a user has viewed on your site over their lifetime- rather than just the current URL. Groucho provides methods to get a user's favorite types of content and capture and store information about their origin. 

Learn more about Groucho in their [full docs](https://github.com/tableau-mkt/groucho/blob/master/DOCS.md).
