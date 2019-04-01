<?php
namespace ionesculiviucristian\LaravelSimpleTree;

class LaravelSimpleTree
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $keyName = 'id';

    /**
     * @var string
     */
    private $parentKeyName = 'parent_id';

    /**
     * @var string
     */
    private $childrenKeyName = 'children';

    /**
     * LaravelSimpleTree constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function build(): array
    {
        $groups = [];

        // Group items by their parent
        foreach ($this->data as $item){
            $groups[$item[$this->parentKeyName]][] = $item;
        }

        $fnBuilder = function($siblings) use (&$fnBuilder, $groups) {
            foreach ($siblings as $k => $sibling) {
                $id = $sibling[$this->keyName];

                if (isset($groups[$id])) {
                    $sibling[$this->childrenKeyName] = $fnBuilder($groups[$id]);
                }

                $siblings[$k] = $sibling;
            }

            return $siblings;
        };

        $tree = $fnBuilder($groups[0]);

        return $tree;
    }

    /**
     * @param string $keyName
     * @return LaravelSimpleTree
     */
    public function setKeyName(string $keyName): LaravelSimpleTree
    {
        $this->keyName = $keyName;

        return $this;
    }

    /**
     * @param string $parentKeyName
     * @return LaravelSimpleTree
     */
    public function setParentKeyName(string $parentKeyName): LaravelSimpleTree
    {
        $this->parentKeyName = $parentKeyName;

        return $this;
    }

    /**
     * @param string $childrenKeyName
     * @return LaravelSimpleTree
     */
    public function setChildrenKeyName(string $childrenKeyName): LaravelSimpleTree
    {
        $this->childrenKeyName = $childrenKeyName;

        return $this;
    }
}
