<!DOCTYPE html>
<html>
<head>
    <script src="https://unpkg.com/@shopify/app-bridge"></script>
    <link rel="stylesheet"
          href="https://unpkg.com/@shopify/polaris@5.10.1/dist/styles.css" />
    <script>
        var AppBridge = window['app-bridge'];
        var actions = window['app-bridge'].actions;
        var createApp = AppBridge.createApp;
        var Redirect = actions.Redirect;

        var app = createApp({
            'apiKey': '{{ env('API_PUBLIC_KEY') }}',
            'shopOrigin': AppBridge.getShopOrigin()
        });
    </script>
</head>
<body>
<div
        style="
        --top-bar-background: #00848e;
        --top-bar-background-lighter: #1d9ba4;
        --top-bar-color: #f9fafb;
        --p-frame-offset: 0px;
      "
>
    <div class="Polaris-Page">
        <div
                class="Polaris-Page-Header Polaris-Page-Header--separator Polaris-Page-Header--hasNavigation Polaris-Page-Header--hasActionMenu"
        >
            <div class="Polaris-Page-Header__Navigation">
                <div class="Polaris-Page-Header__BreadcrumbWrapper">
                    <nav role="navigation">
                        <a
                                class="Polaris-Breadcrumbs__Breadcrumb"
                                href="/products"
                                data-polaris-unstyled="true"
                        ><span class="Polaris-Breadcrumbs__ContentWrapper"
                            ><span class="Polaris-Breadcrumbs__Icon"
                                ><span class="Polaris-Icon"
                                    ><svg
                                                viewBox="0 0 20 20"
                                                class="Polaris-Icon__Svg"
                                                focusable="false"
                                                aria-hidden="true"
                                        >
                          <path
                                  d="M12 16a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 0 1 0-1.414l5-5a.999.999 0 1 1 1.414 1.414L8.414 10l4.293 4.293A.999.999 0 0 1 12 16"
                                  fill-rule="evenodd"
                          ></path></svg></span></span
                                ><span class="Polaris-Breadcrumbs__Content"
                                >Products</span
                                ></span
                            ></a
                        >
                    </nav>
                </div>
                <div class="Polaris-Page-Header__AdditionalNavigationWrapper">
              <span
                      aria-label="Avatar with initials C D"
                      role="img"
                      class="Polaris-Avatar Polaris-Avatar--sizeSmall Polaris-Avatar--styleTwo"
              ><span class="Polaris-Avatar__Initials"
                  ><svg class="Polaris-Avatar__Svg" viewBox="0 0 40 40">
                    <text
                            x="50%"
                            y="50%"
                            dy="0.35em"
                            fill="currentColor"
                            font-size="20"
                            text-anchor="middle"
                    >
                      CD
                    </text>
                  </svg></span
                  ></span
              >
                </div>
                <div class="Polaris-Page-Header__PaginationWrapper">
                    <nav
                            class="Polaris-Pagination Polaris-Pagination--plain"
                            aria-label="Pagination"
                    >
                        <button
                                type="button"
                                class="Polaris-Pagination__Button Polaris-Pagination__PreviousButton"
                                aria-label="Previous"
                        >
                  <span class="Polaris-Icon"
                  ><svg
                              viewBox="0 0 20 20"
                              class="Polaris-Icon__Svg"
                              focusable="false"
                              aria-hidden="true"
                      >
                      <path
                              d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2"
                              fill-rule="evenodd"
                      ></path></svg
                      ></span></button
                        ><button
                                type="button"
                                class="Polaris-Pagination__Button Polaris-Pagination__NextButton"
                                aria-label="Next"
                        >
                  <span class="Polaris-Icon"
                  ><svg
                              viewBox="0 0 20 20"
                              class="Polaris-Icon__Svg"
                              focusable="false"
                              aria-hidden="true"
                      >
                      <path
                              d="M17.707 9.293l-5-5a.999.999 0 1 0-1.414 1.414L14.586 9H3a1 1 0 1 0 0 2h11.586l-3.293 3.293a.999.999 0 1 0 1.414 1.414l5-5a.999.999 0 0 0 0-1.414"
                              fill-rule="evenodd"
                      ></path></svg
                      ></span>
                        </button>
                    </nav>
                </div>
            </div>
            <div class="Polaris-Page-Header__MainContent">
                <div class="Polaris-Page-Header__TitleActionMenuWrapper">
                    <div class="Polaris-Page-Header__Title">
                        <div>
                            <h1
                                    class="Polaris-DisplayText Polaris-DisplayText--sizeLarge"
                            >
                                Polaris
                            </h1>
                        </div>
                    </div>
                    <div class="Polaris-Page-Header__ActionMenuWrapper">
                        <div class="Polaris-ActionMenu">
                            <div class="Polaris-ActionMenu__ActionsLayout">
                                <button type="button" class="Polaris-ActionMenu-MenuAction">
                      <span
                              class="Polaris-ActionMenu-MenuAction__ContentWrapper"
                      ><span
                                  class="Polaris-ActionMenu-MenuAction__IconWrapper"
                          ><span class="Polaris-Icon"
                              ><svg
                                          viewBox="0 0 20 20"
                                          class="Polaris-Icon__Svg"
                                          focusable="false"
                                          aria-hidden="true"
                                  >
                              <path
                                      d="M9.293 13.707l-3-3a.999.999 0 1 1 1.414-1.414L9 10.586V3a1 1 0 1 1 2 0v7.586l1.293-1.293a.999.999 0 1 1 1.414 1.414l-3 3a.999.999 0 0 1-1.414 0zM17 16a1 1 0 1 1 0 2H3a1 1 0 1 1 0-2h14z"
                              ></path></svg></span></span
                          ><span>Import</span></span
                      >
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Polaris-Page-Header__PrimaryActionWrapper">
                    <button
                            type="button"
                            class="Polaris-Button Polaris-Button--primary"
                    >
                <span class="Polaris-Button__Content"
                ><span class="Polaris-Button__Text">New product</span></span
                >
                    </button>
                </div>
            </div>
        </div>
        <div class="Polaris-Page__Content">
            <div class="Polaris-Layout">
                <div class="Polaris-Layout__AnnotatedSection">
                    <div class="Polaris-Layout__AnnotationWrapper">
                        <div class="Polaris-Layout__Annotation">
                            <div class="Polaris-TextContainer">
                                <h2 class="Polaris-Heading">Style</h2>
                                <p>Customize the style of your checkout</p>
                            </div>
                        </div>
                        <div class="Polaris-Layout__AnnotationContent">
                            <div class="Polaris-Card">
                                <div class="Polaris-Card__Section">
                                    <div class="Polaris-SettingAction">
                                        <div class="Polaris-SettingAction__Setting">
                                            Upload your store’s logo, change colors and fonts, and
                                            more.
                                        </div>
                                        <div class="Polaris-SettingAction__Action">
                                            <button
                                                    type="button"
                                                    class="Polaris-Button Polaris-Button--primary"
                                            >
                            <span class="Polaris-Button__Content"
                            ><span>Customize Checkout</span></span
                            >
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Polaris-Layout__AnnotatedSection">
                    <div class="Polaris-Layout__AnnotationWrapper">
                        <div class="Polaris-Layout__Annotation">
                            <div class="Polaris-TextContainer">
                                <h2 class="Polaris-Heading">Account</h2>
                                <p>Connect your account to your Shopify store.</p>
                            </div>
                        </div>
                        <div class="Polaris-Layout__AnnotationContent">
                            <div class="Polaris-Card">
                                <div class="Polaris-Card__Section">
                                    <div class="Polaris-SettingAction">
                                        <div class="Polaris-SettingAction__Setting">
                                            <div class="Polaris-Stack">
                                                <div
                                                        class="Polaris-Stack__Item Polaris-Stack__Item--fill"
                                                >
                                                    <div class="Polaris-AccountConnection__Content">
                                                        <div>
                                  <span
                                          class="Polaris-TextStyle--variationSubdued"
                                  >No account connected</span
                                  >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Polaris-SettingAction__Action">
                                            <button
                                                    type="button"
                                                    class="Polaris-Button Polaris-Button--primary"
                                            >
                            <span class="Polaris-Button__Content"
                            ><span>Connect</span></span
                            >
                                            </button>
                                        </div>
                                    </div>
                                    <div class="Polaris-AccountConnection__TermsOfService">
                                        <p>
                                            By clicking Connect, you are accepting Sample’s
                                            <a
                                                    class="Polaris-Link"
                                                    href="https://polaris.shopify.com"
                                                    data-polaris-unstyled="true"
                                            >Terms and Conditions</a
                                            >, including a commission rate of 15% on sales.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Polaris-Layout__AnnotatedSection">
                    <div class="Polaris-Layout__AnnotationWrapper">
                        <div class="Polaris-Layout__Annotation">
                            <div class="Polaris-TextContainer">
                                <h2 class="Polaris-Heading">Form</h2>
                                <p>A sample form using Polaris components.</p>
                            </div>
                        </div>
                        <div class="Polaris-Layout__AnnotationContent">
                            <div class="Polaris-Card">
                                <div class="Polaris-Card__Section">
                                    <div class="Polaris-FormLayout">
                                        <div role="group" class="">
                                            <div class="Polaris-FormLayout__Items">
                                                <div class="Polaris-FormLayout__Item">
                                                    <div class="">
                                                        <div class="Polaris-Labelled__LabelWrapper">
                                                            <div class="Polaris-Label">
                                                                <label
                                                                        id="TextField1Label"
                                                                        for="TextField1"
                                                                        class="Polaris-Label__Text"
                                                                >First Name</label
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="Polaris-TextField">
                                                            <input
                                                                    id="TextField1"
                                                                    value=""
                                                                    placeholder="Tom"
                                                                    class="Polaris-TextField__Input"
                                                                    aria-labelledby="TextField1Label"
                                                                    aria-invalid="false"
                                                            />
                                                            <div
                                                                    class="Polaris-TextField__Backdrop"
                                                            ></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="Polaris-FormLayout__Item">
                                                    <div class="">
                                                        <div class="Polaris-Labelled__LabelWrapper">
                                                            <div class="Polaris-Label">
                                                                <label
                                                                        id="TextField2Label"
                                                                        for="TextField2"
                                                                        class="Polaris-Label__Text"
                                                                >Last Name</label
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="Polaris-TextField">
                                                            <input
                                                                    id="TextField2"
                                                                    value=""
                                                                    placeholder="Ford"
                                                                    class="Polaris-TextField__Input"
                                                                    aria-labelledby="TextField2Label"
                                                                    aria-invalid="false"
                                                            />
                                                            <div
                                                                    class="Polaris-TextField__Backdrop"
                                                            ></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Polaris-FormLayout__Item">
                                            <div class="">
                                                <div class="Polaris-Labelled__LabelWrapper">
                                                    <div class="Polaris-Label">
                                                        <label
                                                                id="TextField3Label"
                                                                for="TextField3"
                                                                class="Polaris-Label__Text"
                                                        >Email</label
                                                        >
                                                    </div>
                                                </div>
                                                <div class="Polaris-TextField">
                                                    <input
                                                            id="TextField3"
                                                            value=""
                                                            placeholder="example@email.com"
                                                            class="Polaris-TextField__Input"
                                                            aria-labelledby="TextField3Label"
                                                            aria-invalid="false"
                                                    />
                                                    <div class="Polaris-TextField__Backdrop"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Polaris-FormLayout__Item">
                                            <div class="">
                                                <div class="Polaris-Labelled__LabelWrapper">
                                                    <div class="Polaris-Label">
                                                        <label
                                                                id="TextField5Label"
                                                                for="TextField5"
                                                                class="Polaris-Label__Text"
                                                        >How did you hear about us?</label
                                                        >
                                                    </div>
                                                </div>
                                                <div
                                                        class="Polaris-TextField Polaris-TextField--multiline"
                                                >
                              <textarea
                                      id="TextField5"
                                      placeholder="Website, ads, email, etc."
                                      class="Polaris-TextField__Input"
                                      aria-labelledby="TextField5Label"
                                      aria-invalid="false"
                              ></textarea>
                                                    <div class="Polaris-TextField__Backdrop"></div>
                                                    <div
                                                            aria-hidden="true"
                                                            class="Polaris-TextField__Resizer"
                                                    >
                                                        <div class="Polaris-TextField__DummyInput">
                                                            Website, ads, email, etc.<br />
                                                        </div>
                                                        <div class="Polaris-TextField__DummyInput">
                                                            <br />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Polaris-FormLayout__Item">
                                            <fieldset class="Polaris-ChoiceList">
                                                <ul class="Polaris-ChoiceList__Choices">
                                                    <li>
                                                        <label class="Polaris-Choice" for="Checkbox1">
                                                            <div class="Polaris-Choice__Control">
                                                                <div class="Polaris-Checkbox">
                                                                    <input
                                                                            type="checkbox"
                                                                            id="Checkbox1"
                                                                            name="ChoiceList1[]"
                                                                            value="false"
                                                                            class="Polaris-Checkbox__Input"
                                                                            aria-invalid="false"
                                                                    />
                                                                    <div
                                                                            class="Polaris-Checkbox__Backdrop"
                                                                    ></div>
                                                                    <div class="Polaris-Checkbox__Icon">
                                        <span class="Polaris-Icon">
                                          <svg
                                                  class="Polaris-Icon__Svg"
                                                  viewBox="0 0 20 20"
                                          >
                                            <g fill-rule="evenodd">
                                              <path
                                                      d="M8.315 13.859l-3.182-3.417a.506.506 0 0 1 0-.684l.643-.683a.437.437 0 0 1 .642 0l2.22 2.393 4.942-5.327a.437.437 0 0 1 .643 0l.643.684a.504.504 0 0 1 0 .683l-5.91 6.35a.437.437 0 0 1-.642 0"
                                              ></path>
                                              <path
                                                      d="M8.315 13.859l-3.182-3.417a.506.506 0 0 1 0-.684l.643-.683a.437.437 0 0 1 .642 0l2.22 2.393 4.942-5.327a.437.437 0 0 1 .643 0l.643.684a.504.504 0 0 1 0 .683l-5.91 6.35a.437.437 0 0 1-.642 0"
                                              ></path>
                                            </g>
                                          </svg>
                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="Polaris-Choice__Label">
                                                                I accept the Terms of Service
                                                            </div>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="Polaris-Choice" for="Checkbox2">
                                                            <div class="Polaris-Choice__Control">
                                                                <div class="Polaris-Checkbox">
                                                                    <input
                                                                            type="checkbox"
                                                                            id="Checkbox2"
                                                                            name="ChoiceList1[]"
                                                                            value="false2"
                                                                            class="Polaris-Checkbox__Input"
                                                                            aria-invalid="false"
                                                                    />
                                                                    <div
                                                                            class="Polaris-Checkbox__Backdrop"
                                                                    ></div>
                                                                    <div class="Polaris-Checkbox__Icon">
                                        <span class="Polaris-Icon">
                                          <svg
                                                  class="Polaris-Icon__Svg"
                                                  viewBox="0 0 20 20"
                                          >
                                            <g fill-rule="evenodd">
                                              <path
                                                      d="M8.315 13.859l-3.182-3.417a.506.506 0 0 1 0-.684l.643-.683a.437.437 0 0 1 .642 0l2.22 2.393 4.942-5.327a.437.437 0 0 1 .643 0l.643.684a.504.504 0 0 1 0 .683l-5.91 6.35a.437.437 0 0 1-.642 0"
                                              ></path>
                                              <path
                                                      d="M8.315 13.859l-3.182-3.417a.506.506 0 0 1 0-.684l.643-.683a.437.437 0 0 1 .642 0l2.22 2.393 4.942-5.327a.437.437 0 0 1 .643 0l.643.684a.504.504 0 0 1 0 .683l-5.91 6.35a.437.437 0 0 1-.642 0"
                                              ></path>
                                            </g>
                                          </svg>
                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="Polaris-Choice__Label">
                                                                I consent to receiving emails
                                                            </div>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </fieldset>
                                        </div>
                                        <div class="Polaris-FormLayout__Item">
                                            <button
                                                    type="button"
                                                    class="Polaris-Button Polaris-Button--primary"
                                            >
                            <span class="Polaris-Button__Content"
                            ><span>Submit</span></span
                            >
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Polaris-Layout__Section">
                    <div class="Polaris-FooterHelp">
                        <div class="Polaris-FooterHelp__Content">
                            <div class="Polaris-FooterHelp__Icon">
                    <span
                            class="Polaris-Icon Polaris-Icon--colorTeal Polaris-Icon--hasBackdrop"
                    >
                      <svg class="Polaris-Icon__Svg" viewBox="0 0 20 20">
                        <g fill-rule="evenodd">
                          <path
                                  d="M6 4.038a2 2 0 1 0-3.999-.001A2 2 0 0 0 6 4.038zm2 0c0 2.21-1.79 4-4 4s-4-1.79-4-4 1.79-4 4-4 4 1.79 4 4zM18 4a2 2 0 1 0-3.999-.001A2 2 0 0 0 18 4zm2 0c0 2.21-1.79 4-4 4s-4-1.79-4-4 1.79-4 4-4 4 1.79 4 4zm-2 12a2 2 0 1 0-3.999-.001A2 2 0 0 0 18 16zm2 0c0 2.21-1.79 4-4 4s-4-1.79-4-4 1.79-4 4-4 4 1.79 4 4zm-14 .038a2 2 0 1 0-3.999-.001A2 2 0 0 0 6 16.038zm2 0c0 2.21-1.79 4-4 4s-4-1.79-4-4 1.79-4 4-4 4 1.79 4 4z"
                                  fill-rule="nonzero"
                          ></path>
                          <path
                                  d="M18 10.038a8 8 0 1 1-16 0 8 8 0 0 1 16 0zM10 14c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"
                                  fill="currentColor"
                          ></path>
                          <path
                                  d="M17 10.038a7 7 0 1 0-14 0 7 7 0 0 0 14 0zm2 0a9 9 0 1 1-18.001-.001A9 9 0 0 1 19 10.038z"
                                  fill-rule="nonzero"
                          ></path>
                          <path
                                  d="M13 10.038a3 3 0 1 0-6 0 3 3 0 0 0 6 0zm2 0c0 2.76-2.24 5-5 5s-5-2.24-5-5 2.24-5 5-5 5 2.24 5 5z"
                                  fill-rule="nonzero"
                          ></path>
                          <path
                                  d="M13.707 7.707l2-2a1 1 0 0 0-1.414-1.414l-2 2a1 1 0 0 0 1.414 1.414zm-1.414 6l2 2a1 1 0 0 0 1.414-1.414l-2-2a1 1 0 0 0-1.414 1.414zM7.707 6.33l-2-2a1 1 0 0 0-1.414 1.415l2 2a1 1 0 0 0 1.414-1.414zm-1.414 6l-2 2a1 1 0 0 0 1.414 1.415l2-2a1 1 0 0 0-1.414-1.414z"
                                  fill-rule="nonzero"
                          ></path>
                        </g>
                      </svg>
                    </span>
                            </div>
                            <div class="Polaris-FooterHelp__Text">
                                For more details on Polaris, visit our
                                <a
                                        class="Polaris-Link"
                                        href="https://polaris.shopify.com"
                                        data-polaris-unstyled="true"
                                >style guide</a
                                >.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>