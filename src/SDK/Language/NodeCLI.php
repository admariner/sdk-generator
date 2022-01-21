<?php

namespace Appwrite\SDK\Language;

class NodeCLI extends JS
{

    /**
     * @var array
     */
    protected $params = [
        'npmPackage' => 'packageName',
        'bowerPackage' => 'packageName',
        'executableName' => 'executable',
    ];

    /**
     * @param string $name
     * @return $this
     */
    public function setExecutableName($name)
    {
        $this->setParam('executableName', $name);

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'node-cli';
    }

    /**
     * @return array
     */
    public function getFiles()
    {
        return [
            [
                'scope'         => 'default',
                'destination'   => 'README.md',
                'template'      => 'node-cli/README.md.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'package.json',
                'template'      => 'node-cli/package.json.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'LICENSE.md',
                'template'      => 'node-cli/LICENSE.md.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'install.sh',
                'template'      => 'node-cli/install.sh.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'index.js',
                'template'      => 'node-cli/index.js.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'method',
                'destination'   => 'docs/examples/{{service.name | caseLower}}/{{method.name | caseDash}}.md',
                'template'      => 'node-cli/docs/example.md.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => '.gitignore',
                'template'      => 'node-cli/.gitignore',
                'minify'        => false,
            ],
            [
                'scope'         => 'copy',
                'destination'   => '.github/workflows/npm-publish.yml',
                'template'      => 'node-cli/.github/workflows/npm-publish.yml',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'lib/sdks.js',
                'template'      => 'node-cli/lib/sdks.js.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'lib/questions.js',
                'template'      => 'node-cli/lib/questions.js.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'lib/parser.js',
                'template'      => 'node-cli/lib/parser.js.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'lib/exception.js',
                'template'      => 'node-cli/lib/exception.js.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'lib/config.js',
                'template'      => 'node-cli/lib/config.js.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'lib/client.js',
                'template'      => 'node-cli/lib/client.js.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'lib/commands/init.js',
                'template'      => 'node-cli/lib/commands/init.js.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'lib/commands/deploy.js',
                'template'      => 'node-cli/lib/commands/deploy.js.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'service',
                'destination'   => '/lib/commands/{{service.name | caseDash}}.js',
                'template'      => 'node-cli/lib/commands/command.js.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'lib/commands/generic.js',
                'template'      => 'node-cli/lib/commands/generic.js.twig',
                'minify'        => false,
            ]
        ];
    }

    /**
     * @param array $param
     * @return string
     */
    public function getParamExample(array $param)
    {
        $type       = $param['type'] ?? '';
        $example    = $param['example'] ?? '';

        $output = '';

        if(empty($example) && $example !== 0 && $example !== false) {
            switch ($type) {
                case self::TYPE_NUMBER:
                case self::TYPE_INTEGER:
                case self::TYPE_BOOLEAN:
                    $output .= 'null';
                    break;
                case self::TYPE_STRING:
                    $output .= "''";
                    break;
                case self::TYPE_ARRAY:
                    $output .= 'one two three';
                    break;
                case self::TYPE_OBJECT:
                    $output .= '\'{ "key": "value" }\'';
                    break;
                case self::TYPE_FILE:
                    $output .= "'path/to/file.png'";
                    break;
            }
        }
        else {
            switch ($type) {
                case self::TYPE_ARRAY:
                    if(strpos($example, '[') !== false && strpos($example, ']') !== false) {
                        $trimmed = substr($example, 1, -1);
                        $split = explode(',', $trimmed);
                        $output .= implode(' ', $split);
                    } else {
                        $output .= $example;
                    }
                    break;
                case self::TYPE_OBJECT:
                    $output .= '\'{ "key": "value" }\'';
                    break;
                case self::TYPE_NUMBER:
                case self::TYPE_INTEGER:
                    $output .= $example;
                    break;
                case self::TYPE_BOOLEAN:
                    $output .= ($example) ? 'true' : 'false';
                    break;
                case self::TYPE_STRING:
                    $output .= "{$example}";
                    break;
                case self::TYPE_FILE:
                    $output .= "'path/to/file.png'";
                    break;
            }
        }

        return $output;
    }
}
