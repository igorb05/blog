@props(['main_page' => '', 'show_page' => ''])

{{-- @TODO: вынести отдельно? --}}
<style>
    .post-content {

        .attachment--jpg,
        .attachment--png,
        .attachment--webp {

            a {
                img {
                    width: 600px;
                    height: auto;
                    margin-top: 15px;

                    border-top-left-radius: 8px;
                    border-top-right-radius: 8px;
                }

                .attachment__caption {
                    max-width: 600px;
                    padding: 5px 10px;
                    margin-bottom: 15px;

                    background: #e0e7ff;
                    border-bottom-left-radius: 8px;
                    border-bottom-right-radius: 8px;
                }
            }
        }

        .attachment--file {

            a {

                .attachment__caption {
                    position: relative;

                    max-width: max-content;
                    padding: 5px 10px;
                    margin-bottom: 15px;

                    font-size: 14px;

                    background: #e0e7ff;
                    border-radius: 8px;
                }

                .attachment__caption::before {
                    position: absolute;
                    top: 5px;
                    right: -25px;

                    width: 20px;
                    height: 20px;

                    content: '';
                    background-image: url("/images/icons/download.svg");
                    background-size: contain;
                    background-repeat: no-repeat;
                }
            }
        }

        blockquote {
            padding-left: 10px;

            font-style: italic;
            color: #818cf8;

            border-left: 4px solid #818cf8;
        }

        ul, ol {
            counter-reset: custom-counter;
        }

        ul li, ol li {
            position: relative;

            padding-left: 15px;
        }

        ul li:before {
            position: absolute;
            top: 0;
            left: 0;

            content: "•";
            font-size: 1em;
            color: #818cf8;
        }

        ol li:before {
            position: absolute;
            top: 2px;
            left: 0;

            counter-increment: custom-counter;
            content: counter(custom-counter) ".";
            font-size: 14px;
            text-align: right;
            color: #818cf8;
        }
    }
</style>

<div
    {{ $attributes->class([
        "post-content mb-3 px-5 py-3 bg-white rounded-[20px] sm:px-10 sm:py-6",
        "max-w-3xl" => $main_page, // карточка для главной
        "max-w-full h-max" => $show_page, // карточка для детальной статьи
    ]) }}>

    {{ $slot }}
</div>
